const puppeteer = require('puppeteer');
const axios = require('axios');
const cheerio = require('cheerio')
const request = require('request');


exports.webScrapping = {
    Query: {
        scrapCourses: async (_, args, context) => {
            const url =  `https://www.coursera.org/search?query=${args.courseType}`;
            console.log(url)
            // const id = context.userId;
            // console.log("aa", id)
            try {
                // if (!context.isAuth)
                //     return new Error("Invalid Jwt Token!");

                console.log('args')
                console.log(args)
                const browser = await puppeteer.launch({
                    // userDataDir: './temp',
                    defaultViewport: false,
                    // headless:false
                });

                const page = await browser.newPage();
                await page.goto(url, { timeout: 60000 });
                try {
                    await page.waitForSelector('ul.cds-71.css-18msmec.cds-72', { timeout: 30000 }); // set a timeout of 30 seconds (30000 milliseconds) for the selector to appear
                } catch (err) {
                    if (err instanceof puppeteer.errors.TimeoutError) {
                        console.log("TimeoutError: Waiting for selector `ul.cds-71.css-18msmec.cds-72` failed");
                    } else {
                        throw err;
                    }
                }
                
                const coursesHandles = await page.$$('.cds-71.css-18msmec.cds-72 > .cds-71.css-0.cds-73.cds-grid-item.cds-118.cds-126.cds-138');
                // console.log('cds-71 css-18msmec cds-72')
                const scrappedCourses = [];
                var title, rating, author, image, description, link = ''
                for (const coursehandle of coursesHandles) {
                    try{
                    title = await page.evaluate(
                        el => el.querySelector("div > div > a > div > div.css-ilhc4l > div.css-1rj417c > h2").textContent,
                        coursehandle
                    );
                    }
                    catch(err) {}

                    try {
                    rating = await page.evaluate(
                        el => el.querySelector("div > p.cds-33.css-zl0kzj.cds-35").textContent,
                        coursehandle
                    );
                    }
                    catch (err) { }

                    try {
                    author = await page.evaluate(
                        el => el.querySelector("div > div > a > div > div.css-ilhc4l > div.css-1rj417c > div > div > div.cds-71.css-1xdhyk6.cds-73.cds-grid-item > span").textContent,
                        coursehandle
                    );
                    }
                    catch(err) {}

                    try {
                    description = await page.evaluate(
                        el => el.querySelector("div > div > a > div > div.css-ilhc4l > div.css-1rj417c > p").textContent,
                        coursehandle
                    );
                    }
                    catch(err) {}

                    try {
                    image = await page.evaluate(
                        (el) => el.querySelector('div > div > a > div > div.css-1doy6bd > img')?.getAttribute('src'),
                        coursehandle
                    );
                    }
                    catch(err) {}

                    try {
                    link = await page.evaluate(
                        (el) => el.querySelector('div > div > a')?.getAttribute('href'),
                        coursehandle
                    );
                    }
                    catch(err) {}



                    scrappedCourses.push({
                        title,
                        rating,
                        author,
                        description,
                        image,
                        link: 'https://www.coursera.org' + link
                    })

                }

                await browser.close();
                console.log('sent')
                return scrappedCourses;
            } catch (err) {
                console.log(err)
                return err.message;
            }
        }
    }
}
