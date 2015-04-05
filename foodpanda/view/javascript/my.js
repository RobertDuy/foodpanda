function isValidURL(url) {
    var RegExp = /^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/;
    if (RegExp.test(url)) {
        return true;
    } else {
        return false;
    }
}
function checkEmail(nname, type) {
    var arr = new Array(
        '.com', '.net', '.org', '.biz', '.coop', '.info', '.museum', '.name',
        '.pro', '.edu', '.gov', '.int', '.mil', '.ac', '.ad', '.ae', '.af', '.ag',
        '.ai', '.al', '.am', '.an', '.ao', '.aq', '.ar', '.as', '.at', '.au', '.aw',
        '.az', '.ba', '.bb', '.bd', '.be', '.bf', '.bg', '.bh', '.bi', '.bj', '.bm',
        '.bn', '.bo', '.br', '.bs', '.bt', '.bv', '.bw', '.by', '.bz', '.ca', '.cc',
        '.cd', '.cf', '.cg', '.ch', '.ci', '.ck', '.cl', '.cm', '.cn', '.co', '.cr',
        '.cu', '.cv', '.cx', '.cy', '.cz', '.de', '.dj', '.dk', '.dm', '.do', '.dz',
        '.ec', '.ee', '.eg', '.eh', '.er', '.es', '.et', '.fi', '.fj', '.fk', '.fm',
        '.fo', '.fr', '.ga', '.gd', '.ge', '.gf', '.gg', '.gh', '.gi', '.gl', '.gm',
        '.gn', '.gp', '.gq', '.gr', '.gs', '.gt', '.gu', '.gv', '.gy', '.hk', '.hm',
        '.hn', '.hr', '.ht', '.hu', '.id', '.ie', '.il', '.im', '.in', '.io', '.iq',
        '.ir', '.is', '.it', '.je', '.jm', '.jo', '.jp', '.ke', '.kg', '.kh', '.ki',
        '.km', '.kn', '.kp', '.kr', '.kw', '.ky', '.kz', '.la', '.lb', '.lc', '.li',
        '.lk', '.lr', '.ls', '.lt', '.lu', '.lv', '.ly', '.ma', '.mc', '.md', '.mg',
        '.mh', '.mk', '.ml', '.mm', '.mn', '.mo', '.mp', '.mq', '.mr', '.ms', '.mt',
        '.mu', '.mv', '.mw', '.mx', '.my', '.mz', '.na', '.nc', '.ne', '.nf', '.ng',
        '.ni', '.nl', '.no', '.np', '.nr', '.nu', '.nz', '.om', '.pa', '.pe', '.pf',
        '.pg', '.ph', '.pk', '.pl', '.pm', '.pn', '.pr', '.ps', '.pt', '.pw', '.py',
        '.qa', '.re', '.ro', '.rw', '.ru', '.sa', '.sb', '.sc', '.sd', '.se', '.sg',
        '.sh', '.si', '.sj', '.sk', '.sl', '.sm', '.sn', '.so', '.sr', '.st', '.sv',
        '.sy', '.sz', '.tc', '.td', '.tf', '.tg', '.th', '.tj', '.tk', '.tm', '.tn',
        '.to', '.tp', '.tr', '.tt', '.tv', '.tw', '.tz', '.ua', '.ug', '.uk', '.um',
        '.us', '.uy', '.uz', '.va', '.vc', '.ve', '.vg', '.vi', '.vn', '.vu', '.ws',
        '.wf', '.ye', '.yt', '.yu', '.za', '.zm', '.zw', '.asia', '.tel', '.mobi', '.me');
    if (type == 'email') {
        var aNname = nname.split("@");
        var mai = aNname[1];
        if (typeof(mai) == "undefined" || mai === null) {
            return false;
        }
    }
    if (type == 'url') {
        mai = nname;
        if (typeof(mai) == "undefined" || mai === null) {
            return false;
        }
    }
    var val = true;

    var dot = mai.lastIndexOf(".");
    var dname = mai.substring(0, dot);
    var ext = mai.substring(dot, mai.length);
//alert(ext);

    if (dot > 2 && dot < 57) {
        for (var i = 0; i < arr.length; i++) {
            if (ext == arr[i]) {
                val = true;
                break;
            }
            else {
                val = false;
            }
        }
        if (val == false) {
            return false;
        }
        else {
            for (var j = 0; j < dname.length; j++) {
                var dh = dname.charAt(j);
                var hh = dh.charCodeAt(0);
                if ((hh > 47 && hh < 59) || (hh > 64 && hh < 91) || (hh > 96 && hh < 123) || hh == 45 || hh == 46) {
                    return true;
                }
                else {
                    return false;
                }
            }
        }
    }
    else {
        return false;
    }

    return true;
}

// check ky tu dac biet
var mikExp = /[$\\@\\\#%\^\&\*\(\)\[\]\!\+\_\-\?\{\}\`\~\=\|]/;
function dodacheck(val) {
    var strPass = val.value;
    var strLength = strPass.length;
    var lchar = val.value.charAt((strLength) - 1);
    if (lchar.search(mikExp) != -1) {
        var tst = val.value.substring(0, (strLength) - 1);
        val.value = tst;
    }
}

// check ussername
var mikExpUser = /[$\\@\\\#%\^\&\*\(\)\[\]\!\+\-\?\ \{\}\`\~\=\|]/;
function dodacheckusername(val) {
    var strPass = val.value;
    var strLength = strPass.length;
    var lchar = val.value.charAt((strLength) - 1);
    if (lchar.search(mikExpUser) != -1) {
        var tst = val.value.substring(0, (strLength) - 1);
        val.value = tst;
    }
}

// check khoang trang
var mikExpPassword = /[$ ]/;
function dodacheckpassword(val) {
    var strPass = val.value;
    var strLength = strPass.length;
    var lchar = val.value.charAt((strLength) - 1);
    if (lchar.search(mikExpPassword) != -1) {
        var tst = val.value.substring(0, (strLength) - 1);
        val.value = tst;
    }
}

function ajaxRequest(url, type, data, dataType, actionSuccess, actionFailed){
    $.ajax({
        url : url,
        type : type,
        data : data,
        dataType : dataType,
        success: function(data){
            actionSuccess(data);
        },
        error: function(){
            actionFailed();
        }
    });
}

var link = "";

$(document).ready(function(){
    $('#btnDN').bind('click', function(){
        link =  $('#linkSPDN').val().trim();
        if(isValidURL(link)){
            $('#popUpName').html('<span>Bạn đang đề nghị DEAL sản phẩm</span>'+link.substring(0, 47) + '...');
            jQuery('#dn').show();
            jQuery('#dn .popupview').show();
        }else{
            alert('Xin vui lòng nhập đúng link');
        }
    });
});

function sendDN(){
    var data = {
        "link" : link,
        "fullname" : $('#dailyfullname').val().trim(),
        "phone" : $('#phone').val().trim(),
        "email" : $('#email').val().trim(),
        "soluong" : $('#soluong').val().trim()
    };

    ajaxRequest('index.php?route=deal/product_dn/insertOrUpdate', 'POST', data,'json', function(data){
            alert(data);
        }, function(){}
    );
}