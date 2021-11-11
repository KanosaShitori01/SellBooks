var _0xbf19=["\x23\x70\x72\x6F\x76\x69\x6E\x63\x65","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x23\x71\x75\x61\x6E","\x23\x78\x61","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x70\x72\x6F\x76\x69\x6E\x63\x65\x73\x2E\x6F\x70\x65\x6E\x2D\x61\x70\x69\x2E\x76\x6E\x2F\x61\x70\x69\x2F\x3F\x64\x65\x70\x74\x68\x3D\x33","\x74\x68\x65\x6E","\x6A\x73\x6F\x6E","\x6C\x6F\x67","\x3C\x6F\x70\x74\x69\x6F\x6E\x20\x76\x61\x6C\x75\x65\x3D\x22","\x63\x6F\x64\x65","\x22\x3E","\x6E\x61\x6D\x65","\x3C\x2F\x6F\x70\x74\x69\x6F\x6E\x3E","\x6D\x61\x70","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x76\x61\x6C\x75\x65","\x6F\x6E\x63\x68\x61\x6E\x67\x65","\x64\x69\x73\x74\x72\x69\x63\x74\x73","\x77\x61\x72\x64\x73","\x66\x6F\x72\x45\x61\x63\x68"];let province=document[_0xbf19[1]](_0xbf19[0]);let quan=document[_0xbf19[1]](_0xbf19[2]);let xa=document[_0xbf19[1]](_0xbf19[3]);let apiHost=_0xbf19[4];function getProvince(_0x7df3x6){fetch(apiHost)[_0xbf19[5]](function(_0x7df3x7){return _0x7df3x7[_0xbf19[6]]()})[_0xbf19[5]](_0x7df3x6)}function startProvi(){getProvince(function(_0x7df3x9){console[_0xbf19[7]](_0x7df3x9);renderProvi(_0x7df3x9)})}function renderProvi(_0x7df3x9){let _0x7df3xb=_0x7df3x9[_0xbf19[13]]((_0x7df3xc)=>{return `${_0xbf19[8]}${_0x7df3xc[_0xbf19[9]]}${_0xbf19[10]}${_0x7df3xc[_0xbf19[11]]}${_0xbf19[12]}`});province[_0xbf19[14]]= _0x7df3xb;findProvi(province[_0xbf19[15]],_0x7df3x9);province[_0xbf19[16]]= ()=>{findProvi(province[_0xbf19[15]],_0x7df3x9)};quan[_0xbf19[16]]= ()=>{lastfindProvi(quan[_0xbf19[15]],findProvi(province[_0xbf19[15]],_0x7df3x9))}}function findProvi(_0x7df3xe,_0x7df3x9){let _0x7df3xf=[];let _0x7df3x10=[];_0x7df3x9[_0xbf19[19]]((_0x7df3x11)=>{if(_0x7df3x11[_0xbf19[9]]== _0x7df3xe){_0x7df3xf= _0x7df3x11[_0xbf19[17]];_0x7df3xf[_0xbf19[19]]((_0x7df3x12)=>{_0x7df3x10= _0x7df3x12[_0xbf19[18]]})}});let _0x7df3x13=_0x7df3xf[_0xbf19[13]]((_0x7df3xc)=>{return `${_0xbf19[8]}${_0x7df3xc[_0xbf19[9]]}${_0xbf19[10]}${_0x7df3xc[_0xbf19[11]]}${_0xbf19[12]}`});let _0x7df3x14=_0x7df3x10[_0xbf19[13]]((_0x7df3xc)=>{return `${_0xbf19[8]}${_0x7df3xc[_0xbf19[9]]}${_0xbf19[10]}${_0x7df3xc[_0xbf19[11]]}${_0xbf19[12]}`});quan[_0xbf19[14]]= _0x7df3x13;xa[_0xbf19[14]]= _0x7df3x14;return _0x7df3xf}function lastfindProvi(_0x7df3xe,_0x7df3x9){let _0x7df3xf=[];_0x7df3x9[_0xbf19[19]]((_0x7df3x11)=>{if(_0x7df3x11[_0xbf19[9]]== _0x7df3xe){_0x7df3xf= _0x7df3x11[_0xbf19[18]]}});let _0x7df3x13=_0x7df3xf[_0xbf19[13]]((_0x7df3xc)=>{return `${_0xbf19[8]}${_0x7df3xc[_0xbf19[9]]}${_0xbf19[10]}${_0x7df3xc[_0xbf19[11]]}${_0xbf19[12]}`});xa[_0xbf19[14]]= _0x7df3x13}startProvi()
window.addEventListener("scroll", ()=>{
    let header = document.querySelectorAll(".heading_page__navhead");
    header.forEach((val)=>{
        val.classList.toggle("sticky", scrollY > 0);
    });
})
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
function OnlyNum(e, max){
    e.value = e.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
}
let textarea = document.querySelectorAll("textarea");
// console.log(textarea[0]);
for(let i = 0; i < textarea.length; i++){
    if(textarea[i].value[0] == " "){
        textarea[i].value.trim();
    }  
}
let quant = document.querySelector("#quant");
let res = document.querySelector(".res");
function quanIM(){
    if(quant.value == "" || quant.value == 0){
        quant.value = 1;
        res.innerHTML = `<div class='main_page__manager__control__ebox__input res'>
        <div class='main_page__manager__control__ebox__tab'>
            <label>Hình Ảnh 1: </label>
        </div>
        <div class='main_page__manager__control__ebox__tab'>
            <input type='file' required name='img_news_ind_1' />
        </div>
        </div>`;
    }
    else if(quant.value > 10){
        res.innerHTML = "";
    } 
    else{
        res.innerHTML = "";
        for(let i = 0; i < quant.value; i++){      
            res.innerHTML += `<div class='main_page__manager__control__ebox__input res'>
            <div class='main_page__manager__control__ebox__tab'>
                <label>Hình Ảnh ${i+1}: </label>
            </div>
            <div class='main_page__manager__control__ebox__tab'>
                <input type='file' required name='img_news_ind_${i+1}' />
            </div>
            </div>`;
        }
    }
}
let number = document.querySelectorAll(".price");
let formatter = new Intl.NumberFormat('de-DE', {
style: 'currency',
currency: 'VND'
});
for(let i = 0; i < number.length; i++){
    var numberString = formatter.formatToParts(number[i].innerHTML).map(({type, value}) => {
        switch (type) {
          case 'currency': return `<strong>${value}</strong>`;
          default : return value;
        }
    }).reduce((string, part) => string + part);
    number[i].innerHTML = numberString;
}
var _0xd738=["\x74\x72\x69\x6D","\x76\x61\x6C","\x6C\x6F\x67","","\x46\x75\x6E\x63\x74\x69\x6F\x6E\x2F\x73\x65\x61\x72\x63\x68\x2E\x70\x68\x70","\x50\x4F\x53\x54","\x66\x61\x64\x65\x49\x6E","\x23\x72\x65\x73\x75\x6C\x74","\x68\x74\x6D\x6C","\x61\x6A\x61\x78","\x66\x61\x64\x65\x4F\x75\x74","\x6B\x65\x79\x75\x70","\x23\x66\x69\x6E\x64\x62\x6F\x6F\x6B\x73","\x63\x6C\x69\x63\x6B","\x6C\x69","\x74\x65\x78\x74","\x6F\x6E","\x69\x6E\x70\x75\x74","\x66\x69\x6E\x64","\x2E\x73\x6E\x69\x70\x70\x65\x72","\x63\x6C\x6F\x73\x65\x73\x74","\x31","\x2E\x70\x72\x65\x76","\x2E\x6E\x65\x78\x74","\x72\x65\x61\x64\x79"];$(document)[_0xd738[24]](function(){$(_0xd738[12])[_0xd738[11]](function(){let _0x66ebx1=$(this)[_0xd738[1]]()[_0xd738[0]]();console[_0xd738[2]](_0x66ebx1);if(_0x66ebx1!= _0xd738[3]){$[_0xd738[9]]({url:_0xd738[4],method:_0xd738[5],data:{query:_0x66ebx1},success:function(_0x66ebx2){$(_0xd738[7])[_0xd738[6]]();$(_0xd738[7])[_0xd738[8]](_0x66ebx2)}})}else {$(_0xd738[7])[_0xd738[10]]();$(_0xd738[7])[_0xd738[8]](_0xd738[3])}});$(document)[_0xd738[16]](_0xd738[13],_0xd738[14],function(){let _0x66ebx3=$(this)[_0xd738[15]]()[_0xd738[0]]();$(_0xd738[12])[_0xd738[1]](_0x66ebx3);$(_0xd738[7])[_0xd738[10]]()});$(_0xd738[22])[_0xd738[16]](_0xd738[13],function(){let _0x66ebx4=$(this)[_0xd738[20]](_0xd738[19])[_0xd738[18]](_0xd738[17])[_0xd738[1]]();if(_0x66ebx4== 1){$(this)[_0xd738[20]](_0xd738[19])[_0xd738[18]](_0xd738[17])[_0xd738[1]](_0xd738[21])}else {let _0x66ebx5=_0x66ebx4- 1;$(this)[_0xd738[20]](_0xd738[19])[_0xd738[18]](_0xd738[17])[_0xd738[1]](_0x66ebx5)}});$(_0xd738[23])[_0xd738[16]](_0xd738[13],function(){let _0x66ebx6=$(this)[_0xd738[20]](_0xd738[19])[_0xd738[18]](_0xd738[17])[_0xd738[1]]();let _0x66ebx7=++_0x66ebx6;$(this)[_0xd738[20]](_0xd738[19])[_0xd738[18]](_0xd738[17])[_0xd738[1]](_0x66ebx7)})})
let barNav = document.querySelector(".heading_page_bar_mobile__active");
let barBtn = document.querySelector(".heading_page_bar_mobile__active i");
let menuMobile = document.querySelector(".heading_page_bar_mobile__content");
let checkStyles = window.getComputedStyle(menuMobile);
let put = true;
barBtn.addEventListener("click", ()=>{
    put = !put;
    if(put){
        menuMobile.style.transform = "translateX(-100%)";
        barBtn.className = "fas fa-bars";
    }else{
        menuMobile.style.transform = "translateX(0%)";
        barBtn.className = "fas fa-times";
    }
    // console.log(menuMobile);
});
let cate = document.querySelector("#cate");
let cateB = document.querySelector(".books");
let cateA = document.querySelector(".author");
cate.onchange = () => {
    if(cate.value == "A"){
        cateA.style.display = "block";
        cateB.style.display = "none";
    }else{
        cateB.style.display = "block";
        cateA.style.display = "none";
    }
    
}
let titleList = document.querySelector(".title_list");
let mainList = document.querySelector(".main_list");
if(titleList != undefined){
    titleList.addEventListener("click", () => {
        put = !put;
        let arro = document.querySelector(".arro");
        if(put){
            arro.style.transform = "rotate(0deg)";
            mainList.style.height = "0";
        }else{
            arro.style.transform = "rotate(180deg)";
            mainList.style.height = "auto";
        }
        
    });
}

