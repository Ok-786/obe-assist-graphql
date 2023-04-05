const jwt = require('jsonwebtoken');

module.exports = async ({ req }) => {
    let verifiedToken;
    try {
        const authHeader = req.get('Authorization'); // Authorization: Bearer token
        if (!authHeader) {
            return {
                isAuth: false
            }
        }
        const token = authHeader.split(' ')[1]; //Bearer token, but by using [1] we only get token
        if (!token || token === '') {
            return {
                isAuth: false
            }
        }
        verifiedToken = jwt.verify(token, process.env.SECRET);
        if (!verifiedToken) {
            return {
                isAuth: false
            }
        }
        // console.log(verifiedToken, "oooooooooooo", token, "    " + process.env.SECRET)
        return {
            userId: verifiedToken.id,
            isAuth: true
        }

    } catch (e) {
        console.log("bbbbbbbbb" + e);
        return {
            isAuth: false
        }
    }

};