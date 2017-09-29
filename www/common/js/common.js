/**
 * Created by litian on 2017/9/8.
 */
function checkIsEmpty(string)
{
    string = $.trim(string);
    if(string.length > 0 && string != undefined && string != null){
        return false;
    }
    return true;
}