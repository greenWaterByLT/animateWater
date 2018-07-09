/**
 * Created by litian on 2018/6/20.
 */

var ballFun = {
    //配置文件
    config:{
        ballNum:15,         //小球总数
        r:60,               //小球半径
        ballClass:'ball',   //小球样式
        ballMinSpeed:1,     //小球最小速度
        ballMaxSpeed:4,     //小球最大速度
        isBackColor:true,   //小球背景颜色是否随机
        innerHTML:false,    //小球内部HTML
        opacity:1,           //小球透明度
    },
    balls:[],   //小球数组
    init:function(id){
        var wrapDiv = document.getElementById(id);
        var maxWidth = wrapDiv.clientWidth,
            maxHeight = wrapDiv.clientHeight;
        ballFun.createBalls(wrapDiv, maxWidth, maxHeight);
        ballFun.allBallStartMove(maxWidth, maxHeight);
    },
    createBalls:function(wrapDiv, maxWidth, maxHeight) {
        for (var i = 0; i < ballFun.config.ballNum; i++) {
            //创建小球元素
            var ball = document.createElement("div");
            ball.className = 'ball ' + ballFun.config.ballClass;      //小球元素 添加class 样式

            //给小球加上唯一属性
            ball.ball_id = i + 1;
            ball.ball_symbol = 'ball_' + ball.ball_id;
            //小球半径
            ball.r = ballFun.config.r;

            //随机小球起始的X坐标和小球的Y坐标
            ball.x = randomNum(ball.r, maxWidth);
            ball.y = randomNum(ball.r, maxHeight);
            ball.style.top = ball.y - ball.r + "px";
            ball.style.left = ball.x - ball.r + "px";

            //随机小球的移动速度
            ball.xspeed = ballFun.ballSpeed(ballFun.config.ballMinSpeed, ballFun.config.ballMaxSpeed);
            ball.yspeed = ballFun.ballSpeed(ballFun.config.ballMinSpeed, ballFun.config.ballMaxSpeed);
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
            ball.style.background = ballFun.config.isBackColor ? randomColor(ballFun.config.opacity) : '';
            //限制小球大小
            ball.style.width = ball.r * 2 + 'px';
            ball.style.height = ball.r * 2 + 'px';

            //给小球内部加HTML内容 数组 的话 就给对应编号的小球加上 默认编号
            ball.innerHTML = ballFun.ballAddHtml(ballFun.config.innerHTML, ball.ball_id);
            //文字居中
            ball.style.textAlign = 'center';
            ball.style.lineHeight = ball.r * 2 + 'px';

            var positionIsTrue = ballFun.ballPosition(ball, maxWidth, maxHeight);
            if(!positionIsTrue){
                i--;
            }else {
                //将小球插入当wrapDiv中
                wrapDiv.appendChild(ball);
                //加入事件
                var ballObj = ballFun.getBallObj(wrapDiv, ball);
                ballFun.addEvent(ballObj);

                //将所有的小球存储到数组中
                ballFun.balls.push(ball);
            }
        }
    },
    ballSpeed:function(minSpeed, maxSpeed){
        return minSpeed + Math.random() * (randomNum(minSpeed, maxSpeed) - minSpeed);
    },
    ballPosition:function(ballObj, maxWidth, maxHeight){
        var position = true;
        var x1 = ballObj.x,
            y1 = ballObj.y;
        if(x1 + ballObj.r >= maxWidth){
            return false;
        }
        if(x1 - ballObj.r <= 0){
            return false;
        }
        if(y1 + ballObj.r >= maxHeight){
            return false;
        }
        if(y1 - ballObj.r <= 0){
            return false;
        }

        for (var i = 0; i < ballFun.balls.length; i++)
        {
            if(ballObj.ball_id != ballFun.balls[i].ball_id){
                var x2 = ballFun.balls[i].x,
                    y2 = ballFun.balls[i].y;
                if(Math.pow(x1 - x2, 2) + Math.pow(y1 - y2, 2)  <= Math.pow(ballFun.config.r * 2, 2)) {
                    position = false;
                    return false;
                }
            }
        }
        return position;
    },
    ballAddHtml:function(html, num){
        if(html){
            if(html[0]){
                return html[num] ? html[num] : html[html.length - 1];
            }else {
                return html;
            }
        }

        return num;
    },
    moveBalls:function(ballObj, maxWidth, maxHeight){
        setInterval(function () {
            //小球的位置
            ballObj.style.top = ballObj.y - ballObj.r + "px";
            ballObj.style.left = ballObj.x - ballObj.r + "px";
            if(ballObj.stop){
                ballFun.crash(ballObj);
                return true;
            }
            //判断小球的标志量，对小球作出相应操作
            if (ballObj.yflag) {
                //小球向下移动
                ballObj.y += ballObj.yspeed;
                if (ballObj.y >= maxHeight - ballObj.r) {
                    ballObj.y = maxHeight - ballObj.r;
                    ballObj.yflag = false;
                }
            } else {
                //小球向上移动
                ballObj.y -= ballObj.yspeed;
                if (ballObj.y - ballObj.r <= 0) {
                    ballObj.y = ballObj.r;
                    ballObj.yflag = true;
                }
            }
            if (ballObj.xflag) {
                //小球向右移动
                ballObj.x += ballObj.xspeed;
                if (ballObj.x >= maxWidth - ballObj.r) {
                    ballObj.x = maxWidth - ballObj.r;
                    ballObj.xflag = false;
                }
            } else {
                //小球向左移动
                ballObj.x -= ballObj.xspeed;
                if (ballObj.x - ballObj.r <= 0) {
                    ballObj.x = ballObj.r;
                    ballObj.xflag = true;
                }
            }
            ballFun.crash(ballObj);
        }, 10);
    },
    crash:function(ballObj){
        var x1, y1, x2, y2;
        //通过传过来的小球对象来获取小球的X坐标和Y坐标
        x1 = ballObj.x;
        y1 = ballObj.y;
        for (var i = 0; i < ballFun.balls.length; i++) {
            //确保不和自己对比
            if (ballObj.ball_id !=  ballFun.balls[i].ball_id) {
                x2 =  ballFun.balls[i].x;
                y2 =  ballFun.balls[i].y;
                //判断位置的平方和小球的圆心坐标的关系
                if (!ballObj.stop && Math.pow(x1 - x2, 2) + Math.pow(y1 - y2, 2)  <= Math.pow(ballFun.config.r * 2, 2)) {
                    //判断传过来的小球对象，相对于碰撞小球的哪个方位
                    if (ballObj.x <  ballFun.balls[i].x) {
                        if (ballObj.y <  ballFun.balls[i].y) {
                            //小球对象在被碰小球的左上角
                            ballObj.yflag = false;
                            ballObj.xflag = false;
                        } else if (ballObj.y >  ballFun.balls[i].y) {
                            //小球对象在被碰小球的左下角
                            ballObj.xflag = false;
                            ballObj.yflag = true;
                        } else {
                            //小球对象在被撞小球的正左方
                            ballObj.xflag = false;
                        }
                    } else if (ballObj.x >  ballFun.balls[i].x) {
                        if (ballObj.y <  ballFun.balls[i].y) {
                            //小球对象在被碰撞小球的右上方
                            ballObj.yflag = false;
                            ballObj.xflag = true;
                        } else if (ballObj.y >  ballFun.balls[i].y) {
                            //小球对象在被碰撞小球的右下方
                            ballObj.xflag = true;
                            ballObj.yflag = true;
                        } else {
                            //小球对象在被撞小球的正右方
                            ballObj.xflag = true;
                        }
                    } else if (ballObj.y >  ballFun.balls[i].y) {
                        //小球对象在被撞小球的正下方
                        ballObj.yflag = true;
                    } else if (ballObj.y <  ballFun.balls[i].y) {
                        //小球对象在被撞小球的正上方
                        ballObj.yflag = false;
                    }
                    //速度替换
                    var tempX = ballObj.xspeed,
                        tempY = ballObj.yspeed;
                    ballObj.xspeed = ballFun.balls[i].xspeed;
                    ballObj.yspeed = ballFun.balls[i].yspeed;
                    if(!ballFun.balls[i].stop) {
                        ballFun.balls[i].xspeed = tempX;
                        ballFun.balls[i].yspeed = tempY;
                    }
                }
            }
        }
    },
    allBallStartMove:function(maxWidth, maxHeight){
        for (var i = 0; i < ballFun.balls.length; i++) {
            //将所有的小球传到函数中,来实现对小球的移动
            ballFun.moveBalls(ballFun.balls[i], maxWidth, maxHeight);
        }
    },
    //操作事件
    getBallObj:function(wrapDiv, ballObj){
        var childrenNodeList = wrapDiv.childNodes,
            obj = {};
        for (var i in childrenNodeList){
            if(childrenNodeList[i].className != undefined && childrenNodeList[i].className.indexOf("ball") != -1 && childrenNodeList[i].ball_symbol == ballObj.ball_symbol){
                obj = childrenNodeList[i];
                break;
            }
        }
        return obj;
    },
    addEvent:function(ballObj){
        ballFun.createEvent(ballObj, 'onclick', function(ballObj){
            ballFun.callback.onclick(ballObj);
        });
        ballFun.createEvent(ballObj, 'onmouseover', function(ballObj){
            ballFun.callback.onMouseOver(ballObj);
        });
        ballFun.createEvent(ballObj, 'onmouseout', function(ballObj){
            ballFun.callback.onMouseOut(ballObj);
        });
    },
    createEvent:function(ballObj, type, func){
        ballObj[type] = function(){
            if(typeof func === 'function'){
                func(ballObj);
            }
        };
    },
    callback:{
        onclick:function(ballObj){
            console.log(ballObj.xspeed);
            console.log(ballObj.yspeed);
        },
        onMouseOver:function(ballObj){
            ballObj.stop = true;
        },
        onMouseOut:function(ballObj){
            ballObj.stop = false;
        }
    },
};

/**
 * 生成并返回一个从m到n全区间的随机数
 * @param {Object} m
 * @param {Object} n
 */
function randomNum(m, n){
    return Math.floor(Math.random() * (n - m + 1) + m);
};

/**
 * 生成一个随机颜色，并返回rgb字符串值
 */
function randomColor(opacity){
    var r = randomNum(0, 255);
    var g = randomNum(0, 255);
    var b = randomNum(0, 255);
    return "rgb(" + r + "," + g + "," + b + "," + opacity + ")";
};