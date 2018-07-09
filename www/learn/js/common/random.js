/**
 * Created by litian on 2018/6/20.
 */

var randomAcquisition  = {

    /**
     * 生成并返回一个从m到n全区间的随机数
     * @param m
     * @param n
     * @returns {number}
     */
    randomNum:function(m, n){
        return Math.floor(Math.random() * (n - m + 1) + m);
    },

    /**
     * 生成一个随机颜色，并返回rgb字符串值
     * @param opacity   颜色透明度
     * @returns {string}
     */
    randomColor:function(opacity){
        var r = randomAcquisition.randomNum(0, 255);
        var g = randomAcquisition.randomNum(0, 255);
        var b = randomAcquisition.randomNum(0, 255);
        return "rgb(" + r + "," + g + "," + b + "," + opacity +")";
    },

};