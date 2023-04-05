const csv = require('csv-parser');
const fs = require('fs');
const natural = require('natural');
const { promisify } = require('util');

const readFile = promisify(fs.readFile);
const writeFile = promisify(fs.writeFile);

// Load the classifier from a file if it exists, or train a new one if not
async function loadClassifier() {
    const classifierFile = 'classifier.json';
    if (fs.existsSync(classifierFile)) {
        const classifierData = await readFile(classifierFile, 'utf-8');
        return natural.BayesClassifier.restore(JSON.parse(classifierData));
    } else {
        const classifier = new natural.BayesClassifier();
        const tokenizer = new natural.WordTokenizer();

        // Read and process the CSV file using a promise-based approach
        const jobs = await new Promise((resolve, reject) => {
            const jobs = [];
            fs.createReadStream('naukri_com.csv')
                .pipe(csv())
                .on('data', (data) => jobs.push(data))
                .on('end', () => {
                    resolve(jobs);
                })
                .on('error', (err) => {
                    reject(err);
                });
        });

        // Train the classifier
        for (const job of jobs) {
            const text = `${job['Role Category']} ${job['Key Skills']} ${job['Functional Area']} ${job['Role']}`;
            const tokens = tokenizer.tokenize(text);
            const category = job['Job Title'];
            classifier.addDocument(tokens, category);
        }
        classifier.train();

        // Save the trained classifier to a file
        const classifierData = JSON.stringify(classifier);
        await writeFile(classifierFile, classifierData, 'utf-8');

        return classifier;
    }
}

async function classifyJob(object) {
    const classifier = await loadClassifier();

    // Create a tokenizer
    const tokenizer = new natural.WordTokenizer();

    // Classify the given object
    const text = `${object.category} ${object.courseDescription} `;
    const tokens = tokenizer.tokenize(text);
    const result = classifier.classify(tokens);

    return result;
}

exports.jobRecommendation = {
    Query: {
        jobRecommendation: async (_, args) => {
            try {
                const object = {
                    category: args.category ? args.category: 'Coding',
                    courseDescription: args.courseDescription ? args.courseDescription: 'programmer cpp java python and c#',
                }

                const result = await classifyJob(object);
                console.log(object)
                return {title: result}
                ;
            } catch (error) {
                console.error(error);
            }
        }
    }
}
