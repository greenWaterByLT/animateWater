/**
 * Created by litian on 2018/6/20.
 */

window.onload = function() {

    var maxNum = 20;



    /**
     * 生成并返回一个从m到n全区间的随机数
     * @param {Object} m
     * @param {Object} n
     */
    function randomNum(m, n) {
        return Math.floor(Math.random() * (n - m + 1) + m);
    }

    /**
     * 生成一个随机颜色，并返回rgb字符串值
     */
    function randomColor() {
        var r = randomNum(0, 255);
        var g = randomNum(0, 255);
        var b = randomNum(0, 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    }

    //获得wrapDiv
    var wrapDiv = document.getElementById("wrap");

    //定义数组存储所有的小球
    var balls = [];
    //生成小球函数
    function createBalls() {
        for (var i = 0; i < 20; i++) {
            var ball = document.createElement("div");
            ball.className = 'ball';
            //随机小球起始的X坐标和小球的Y坐标
            ball.x = randomNum(0, 1200);
            ball.y = randomNum(0, 700);
            //随机小球的移动速度
            ball.xspeed = Math.random() * randomNum(2, 5);
            ball.yspeed = Math.random() * randomNum(2, 5);
            //随机小球移动的方向
            if (Math.random() - 0.5 > 0) {
                ball.xflag = true;
            } else {
                ball.xflag = false;
            }
            if (Math.random() - 0.5 > 0) {
                ball.yflag = true;
            } else {
                ball.yflag = false;
            }
            //随机小球的背景颜色
            ball.style.backgroundColor = randomColor();
            ball.innerHTML = i + 1;
            //将小球插入当wrapDiv中
            wrapDiv.appendChild(ball);
            //将所有的小球存储到数组中
            balls.push(ball);
        }
    }

    createBalls();
    //小球移动函数，判断小球的位置
    function moveBalls(ballObj) {
        setInterval(function () {
            ballObj.style.top = ballObj.y + "px";
            ballObj.style.left = ballObj.x + "px";
            //判断小球的标志量，对小球作出相应操作
            if (ballObj.yflag) {
                //小球向下移动
                ballObj.y += ballObj.speed;
                if (ballObj.y >= 800 - ballObj.offsetWidth) {
                    ballObj.y = 800 - ballObj.offsetWidth;
                    ballObj.yflag = false;
                }
            } else {
                //小球向上移动
                ballObj.y -= ballObj.speed;
                if (ballObj.y <= 0) {
                    ballObj.y = 0;
                    ballObj.yflag = true;
                }
            }
            if (ballObj.xflag) {
                //小球向右移动
                ballObj.x += ballObj.speed;
                if (ballObj.x >= 1300 - ballObj.offsetHeight) {
                    ballObj.x = 1300 - ballObj.offsetHeight;
                    ballObj.xflag = false;
                }
            } else {
                //小球向左移动
                ballObj.x -= ballObj.speed;
                if (ballObj.x <= 0) {
                    ballObj.x = 0;
                    ballObj.xflag = true;
                }
            }
            crash(ballObj);
        }, 10);
    }

    var x1, y1, x2, y2;
    //碰撞函数
    function crash(ballObj) {
        //通过传过来的小球对象来获取小球的X坐标和Y坐标
        x1 = ballObj.x;
        y1 = ballObj.y;
        for (var i = 0; i < balls.length; i++) {
            //确保不和自己对比
            if (ballObj != balls[i]) {
                x2 = balls[i].x;
                y2 = balls[i].y;
                //判断位置的平方和小球的圆心坐标的关系
                if (Math.pow(x1 - x2, 2) + Math.pow(y1 - y2, 2) + 800 <= Math.pow(ballObj.offsetWidth + balls[i].offsetWidth, 2)) {
                    //判断传过来的小球对象，相对于碰撞小球的哪个方位
                    if (ballObj.x < balls[i].x) {
                        if (ballObj.y < balls[i].y) {
                            //小球对象在被碰小球的左上角
                            ballObj.yflag = false;
                            ballObj.xflag = false;
                        } else if (ballObj.y > balls[i].y) {
                            //小球对象在被碰小球的左下角
                            ballObj.xflag = false;
                            ballObj.yflag = true;
                        } else {
                            //小球对象在被撞小球的正左方
                            ballObj.xflag = false;
                        }
                    } else if (ballObj.x > balls[i].x) {
                        if (ballObj.y < balls[i].y) {
                            //小球对象在被碰撞小球的右上方
                            ballObj.yflag = false;
                            ballObj.xflag = true;
                        } else if (ballObj.y > balls[i].y) {
                            //小球对象在被碰撞小球的右下方
                            ballObj.xflag = true;
                            ballObj.yflag = true;
                        } else {
                            //小球对象在被撞小球的正右方
                            ballObj.xflag = true;
                        }
                    } else if (ballObj.y > balls[i].y) {
                        //小球对象在被撞小球的正下方
                        ballObj.yflag = true;
                    } else if (ballObj.y < balls[i].y) {
                        //小球对象在被撞小球的正上方
                        ballObj.yflag = false;
                    }
                }
            }
        }
    }

    for (var i = 0; i < balls.length; i++) {
        //将所有的小球传到函数中,来实现对小球的移动
        moveBalls(balls[i]);
    }
};


/**
 * Created by litian on 2018/6/15.
 */
window.onload = function(){
    var canvas=document.getElementById("ball");
    var ctx=canvas.getContext("2d");
    var r=100;
    var maxNum=5;
    var ballArray=new Array();
    var maxX=canvas.width;
    var maxY=canvas.height;
    var img = new Image();
    img.src = "/www/learn/images/module/catalog/catalog.jpg";

    for(var n=0;n<maxNum;n++){
        var x={
            x:getRandomNumber(r, maxX-r),
            y:getRandomNumber(r, maxY-r),
            r:r,
            vX:getRandomNumber(0.5, 1),
            vY:getRandomNumber(0.5, 1),
            color:getRandomColorRag(0.4),
        }

        if(ballCreateJudge(ballArray, x)) {     //此球与之前的球不重合 加入 否则 重新计算球
            ballArray.push(x);
        }else {
            n--;
        }
    }

    //判断新创建的球是否会与之前的球重合
    function ballCreateJudge(ballArray, ball)
    {
        var ballTrue = true;
        if(ballArray.length > 0){
            for (var j = 0; j < ballArray.length; j++){
                if(Math.round(Math.pow(ball.x - ballArray[j].x, 2) +
                        Math.pow(ball.y - ballArray[j].y, 2)) <=
                    Math.round(Math.pow(r + r, 2)))     //判断两个球 不会重合
                {
                    ballTrue = false;
                    return false;
                }
            }
        }
        //半圆判断
        var rr = 100;
        var xx = canvas.width/2;
        if(Math.round(Math.pow(ball.x - xx, 2) +
                Math.pow(ball.y - 0, 2)) <=
            Math.round(Math.pow(r + rr, 2)))
        {
            ballTrue = false;
        }

        return ballTrue;
    }

    //获取随机颜色
    function getRandomColor(){
        return (function(m,s,c){
            return (c ? arguments.callee(m,s,c-1) : '#') +
                s[m.floor(m.random() * 16)]
        })(Math,'0123456789abcdef',5)
    }

    //有透明度的颜色
    function getRandomColorRag(opacity){
        return 'rgba('+Math.floor(Math.random() * 256)+','+Math.floor(Math.random() * 256)+','+
            Math.floor(Math.random() * 256)+',' + opacity + ')';
    }

    draw();

    function draw(){
        ctx.fillStyle="#000";
        ctx.fillRect(0,0,canvas.width,canvas.height);
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);   //加背景图片

        for (var i in ballArray){
            var x=i;

            ballArray[i].x+=ballArray[i].vX;
            ballArray[i].y+=ballArray[i].vY;

            //碰壁
            ballImpingement(ballArray[i]);

            //碰设定的固定区域边界
            ballAreaImpingement(ballArray[i]);

            //碰撞
            var c = parseInt(x)+1;
            for(var j=c;j<maxNum;j++) {
                if (j !== x) {
                    if (Math.round(Math.pow(ballArray[x].x - ballArray[j].x, 2) +
                            Math.pow(ballArray[x].y - ballArray[j].y, 2)) <=
                        Math.round(Math.pow(r + r, 2))) {

                        /*var tempX = ballArray[x].vX;
                         var tempY = ballArray[x].vY;
                         ballArray[x].vX = ballArray[j].vX;
                         ballArray[j].vX = tempX;
                         ballArray[x].vY = ballArray[j].vY;
                         ballArray[j].vY = tempY;*/
                        //下面处理 小球不易重叠， 上面注释的存在会重叠 常见
                        var tempX = ballArray[x].vX;
                        var tempY = ballArray[x].vY;
                        if(ballArray[x].x > ballArray[j].x){
                            ballArray[x].vX = ballArray[j].vX == 0 ? -tempX : gt0(ballArray[j].vX);
                            ballArray[j].vX = tempX == 0 ? -ballArray[j].vX : -gt0(tempX);
                        }else {
                            ballArray[x].vX = ballArray[j].vX == 0 ? -tempX : -gt0(ballArray[j].vX);
                            ballArray[j].vX = tempX == 0 ? -ballArray[j].vX : gt0(tempX);
                        }
                        if(ballArray[x].y > ballArray[j].y){
                            ballArray[x].vY = ballArray[j].vY == 0 ? -tempY : gt0(ballArray[j].vY);
                            ballArray[j].vY = tempY == 0 ? -ballArray[j].vY : -gt0(tempY);
                        }else {
                            ballArray[x].vY = ballArray[j].vY == 0 ? -tempY : -gt0(ballArray[j].vY);
                            ballArray[j].vY = tempY == 0 ? -ballArray[j].vY : gt0(tempY);
                        }
                    }
                }
            }
            ctx.beginPath();
            ctx.fillStyle=ballArray[i].color;
            ctx.arc(ballArray[i].x,ballArray[i].y,ballArray[i].r,0,Math.PI*2,true);
            ctx.closePath();
            ctx.fill();
        }

        setTimeout(function(){draw();},0.5);
    }

    function ballImpingement(ball){
        if(ball.x>=maxX-r){
            ball.x=maxX-r;
            ball.vX=-ball.vX;
        }
        if(ball.x<=r){
            ball.x=r;
            ball.vX=-ball.vX;
        }
        if(ball.y>=maxY-r){
            ball.y=maxY-r;
            ball.vY=-ball.vY;
        }
        if(ball.y<=r){
            ball.y=r;
            ball.vY=-ball.vY;
        }
    }

    function ballAreaImpingement(ball){
        //顶层 中点 半圆
        var rr = 100;
        var xx = canvas.width/2;
        if(Math.round(Math.pow(ball.x - xx, 2) +
                Math.pow(ball.y - 0, 2)) <=
            Math.round(Math.pow(r + rr, 2)))
        {
            ball.vX = -ball.vX;
            ball.vY = -ball.vY;
        }
        //顶层 中点 矩形
        /*var xMax = canvas.width/2 + 100;
         var xMin = canvas.width/2 - 100;
         var h = 100;
         if(ball.x > xMax && ball.x <= xMax + r){
         ball.vX = -ball.vX;
         }
         if(ball.x < xMin && ball.x >= xMin - r){
         ball.vX = -ball.vX;
         }
         if(ball.y > h && ball.y <= h + r){
         ball.vY = -ball.vY;
         }*/
    }

    function gt0(number){
        return number > 0 ? number : -number;
    }

    function getRandomNumber(min, max) {
        return (min + Math.floor(Math.random() * (max - min + 1)))
    }

}