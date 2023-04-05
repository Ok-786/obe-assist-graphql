
exports.authTypeDefs = () => `
        type User {
            id: String!
            email: String!
        }

        input UserInput{
            email: String!
            password: String!
        }

        type AuthData {
            user: User!
            token: String!
            role: String!
        }
        
        type Query {
            user: String
            login(userInput: UserInput): AuthData
        }

        type Mutation {
            createUser(userInput: UserInput): User
        }
        
        schema {
            query: Query
            mutation: Mutation
        }
    `;