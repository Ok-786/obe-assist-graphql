const { mergeTypeDefs } = require('@graphql-tools/merge');
const { authTypeDefs } = require("./auth");
const { courseTypeDefs } = require("./course");
const { jobRecommendationTypeDefs } = require('./jobRecommendation');
const { learnerTypeDefs } = require('./learner');
const { obeTypeDefs } = require('./obe');
const { resourcePersonTypeDefs } = require('./resourcePerson');
const { webScrappingTypeDefs } = require('./webScrapping');

exports.mergeTypeDefs = mergeTypeDefs([
    authTypeDefs,
    courseTypeDefs,
    learnerTypeDefs,
    resourcePersonTypeDefs,
    obeTypeDefs,
    webScrappingTypeDefs,
    jobRecommendationTypeDefs
]);