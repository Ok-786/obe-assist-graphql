exports.transformObe = data => {
    console.log(data)
    return {
        ...data,
        assesmentAttemptId: data.assessmentattempt_id,
        assesmentActivityId: data.assessmentactivity_id,
        learnerId: data.learner_id,
        assessmentId: data.assessment_id,
        courseId: data.course_id,
        resourcePersonId: data.resourceperson_id,
        courseTitle: data.course_title, 
        category: data.course_type,
        courseCode: data.course_code,
        courseCredits: data.course_credits,
        courseRating: data.course_rating,
        courseDescription: data.course_description,
        batchName: data.batch_name,
        semesterName: data.semester_name
    };
};

exports.transformCourse = data => {
    console.log(data)
    return {
        ...data,
        offeredCoursesId: data.offeredcourses_id,
        batchId: data.batch_id,
        resourcePersonId: data.resourseperson_id,
        semesterId: data.semester_id,
        courseId: data.course_id,
        courseTitle: data.course_title,
        batchName: data.batch_name,
        semesterName: data.semester_name,
        courseRegistrationId: data.courseregistration_id,
        learnerId: data.learner_id,
        offeredCourses: data.offered_courses,
        password: data.password,
        id: data.id,
        email: data.email,
        name: data.name,
        designation: data.designation,
        category: data.course_type,
        learnerId: data.learner_id,
        courseCode: data.course_code,
        courseCredits: data.course_credits,
        courseRating: data.course_rating,
        courseDescription: data.course_description,
        isAccepted: data.is_accepted
    };
};

exports.transformUser = (data) => {
    return {
        ...data,
        id: data.learner_id ? data.learner_id : data.resource_person_id
    }
}