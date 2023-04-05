const { mergeResolvers } = require('@graphql-tools/merge');
const { authResolvers } = require("./auth");
const { courseResolvers } = require("./course");
const { jobRecommendation } = require('./jobRecommendation');
const { learnerResolvers } = require('./learner');
const { obeResolvers } = require('./obe');
const { resourcePersonResolvers } = require('./resourcePerson');
const { webScrapping } = require('./webScrapping');

exports.mergeResolvers = mergeResolvers([
    authResolvers,
    courseResolvers,
    learnerResolvers,
    resourcePersonResolvers,
    obeResolvers,
    webScrapping,
    jobRecommendation

]);