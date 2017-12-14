let fs = require('fs');
let join = require('path').join;
let paths = require('path');
var compressor = require('node-minify');

/**
 *
 * @param startPath  起始目录文件夹路径
 * @returns {Array}
 */
function findSync(startPath) {
    let result = [];

    function finder(path) {
        let files = fs.readdirSync(path);
        files.forEach((val, index) => {
            let fPath = join(path, val);
            let stats = fs.statSync(fPath);
            if (stats.isDirectory()) finder(fPath);
            if (stats.isFile()) {
                // console.log('fPath',paths.basename(fPath,'.js'));
                console.log(fPath);
                compressor.minify({
                    compressor: 'gcc',
                    input: fPath,
                    output: './js/min/' + paths.basename(fPath,'.js') + '.min.js',
                    callback: function (err, min) {
                    }
                });
                // result.push(fPath)
                result.push(paths.basename(fPath,'.js'))
            }
        });

    }

    finder(startPath);
    return result;
}

let fileNames = findSync('./js');