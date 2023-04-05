exports.webScrappingTypeDefs = () => `
        type scrappedCourse {
            title: String
            description: String
            rating: String
            author: String
            link: String
            image: String
        }
        
        type Query {
            scrapCourses(courseType: String): [scrappedCourse!]!
        }

        
        schema {
            query: Query
        }
    `;