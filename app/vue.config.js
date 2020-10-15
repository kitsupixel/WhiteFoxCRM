const path = require("path");

module.exports = {
  // modify the location of the generated HTML file.
  // make sure to do this only in production.
  chainWebpack: (config) => {
    if (process.env.NODE_ENV === 'production') {
      config.plugin('html').tap((opts) => {
        opts[0].filename = '../public/app.html';
        return opts;
      });
    }
  },
  outputDir: path.resolve(__dirname, "../public"),
  //assetsDir: "../../static/SPA"
}