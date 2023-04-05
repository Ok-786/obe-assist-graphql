
exports.resourcePersonTypeDefs = () => `
        type ResourcePerson {
            id: ID!
            name: String
            designation: String
            email: String!
            password: String!
        }
        
        type Query {
            resourcePersons: [ResourcePerson!]!
        }

        
        schema {
            query: Query
        }
    `;