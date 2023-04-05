exports.jobRecommendationTypeDefs = () => `
        type job {
            title: String
            name: String
        }
        
        type Query {
            jobRecommendation(category: String, courseDescription: String): job!
        }

        
        schema {
            query: Query
        }
    `;