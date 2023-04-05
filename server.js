const express = require('express');
const app = express();
const cors = require('cors');
const { ApolloServer } = require('@apollo/server');
const { makeExecutableSchema } = require('@graphql-tools/schema');
const { startStandaloneServer } = require('@apollo/server/standalone');
const { ApolloServerPluginLandingPageGraphQLPlayground } = require('apollo-server-core');

const { mergeTypeDefs } = require('./graphql/schema/index');
const { mergeResolvers } = require('./graphql/resolvers');
const context = require('./graphql/middleware/is-auth');

require('dotenv').config();


app.use(cors());
app.use(express.json());

const schema = makeExecutableSchema({
    typeDefs: mergeTypeDefs,
    resolvers: mergeResolvers,
})

const server = new ApolloServer({
    schema,
    plugins: [
        ApolloServerPluginLandingPageGraphQLPlayground()
    ]
});

const port = process.env.PORT ? process.env.PORT : 7000

const startServer = async () => {
    const { url } = await startStandaloneServer(server, {
        listen: { port },
        context
    });
    console.log(`🚀 Server listening at: ${url}`);
};

startServer();


