
exports.learnerTypeDefs = () => `
        type Learner {
            id: ID!
            name: String
            batchId: String
            semesterId: String
            section: String
            email: String!
            password: String!
        }
        
        type Query {
            learners: [Learner!]!
        }

        
        schema {
            query: Query
        }
    `;