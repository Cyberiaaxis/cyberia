(this.webpackJsonpcriminalimpulsetheme=this.webpackJsonpcriminalimpulsetheme||[]).push([[0],{48:function(e,a,t){},49:function(e,a,t){},73:function(e,a,t){},74:function(e,a,t){},75:function(e,a,t){},76:function(e,a,t){},77:function(e,a,t){},78:function(e,a,t){},79:function(e,a,t){"use strict";t.r(a);var n=t(0),r=t.n(n),l=t(26),c=t.n(l),o=t(12),s=t(3),i=t.p+"static/media/logo.cea9d4d8.svg",m=(t(48),t(49),t(23)),d=t(24),u=t(43),p=t(2),f=t.n(p),h=t(8),v=t(5),E=t(21),b=t.n(E);function g(){var e=Object(n.useState)([]),a=Object(v.a)(e,2),t=a[0],r=a[1],l=Object(n.useState)(!1),c=Object(v.a)(l,2),o=c[0],s=c[1],i=Object(n.useState)(!1),m=Object(v.a)(i,2),d=m[0],u=m[1];return{result:t,loading:o,error:d,api:Object(n.useCallback)(function(){var e=Object(h.a)(f.a.mark((function e(a){var t,n=arguments;return f.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(t=n.length>1&&void 0!==n[1]?n[1]:{},a){e.next=3;break}throw new Error("URL required");case 3:return console.log(a),s(!0),t.headers={"Content-Type":"application/json",Accept:"application/json"},e.next=8,b()(a,t).then((function(e){var a=e.data;r(a)})).catch((function(e){console.log(e.response.data),u(e.response.data)}));case 8:case"end":return e.stop()}}),e)})));return function(a){return e.apply(this,arguments)}}(),[])}}function w(){var e=Object(u.a)(),a=e.register,t=e.errors,n=e.handleSubmit,l=(e.clearErrors,g()),c=l.error,o=l.result,i=l.api,p=l.loading,f=Object(s.f)();return r.a.createElement(r.a.Fragment,null,r.a.createElement("div",null,r.a.createElement("p",{className:"top"},"Recover Account"),r.a.createElement("form",{className:"form-inline",method:"post",onSubmit:n((function(e){if(i("http://criminalimpulse.com/api/login",{method:"post",data:e}),!c)return f.push("/player-dashboard");console.log(e)}))},r.a.createElement("div",{className:"form-group"},r.a.createElement("div",{className:"input-group"},r.a.createElement("span",{className:"form-addon"},r.a.createElement(m.a,{icon:d.c,color:"#63102f",size:"xs"})),r.a.createElement("input",{type:"email",placeholder:"Username",className:"form-control",name:"email",ref:a({required:!0})})),t.email&&r.a.createElement("span",null,"This field is required")),r.a.createElement("div",{className:"form-group"},r.a.createElement("div",{className:"input-group"},r.a.createElement("span",{className:"form-addon"},r.a.createElement(m.a,{icon:d.b,color:"#63102f",size:"xs"})),r.a.createElement("input",{type:"password",placeholder:"Password",className:"form-control",name:"password",ref:a({required:!0,maxLength:20})})),t.password&&r.a.createElement("span",null,"This field is required")),r.a.createElement("div",{className:"form-group"},r.a.createElement("button",{type:"submit",className:"btn btn-primary"},r.a.createElement(m.a,{icon:d.a,color:"red",size:"xs"}))),JSON.stringify(c.errors)&&c.errors.email&&r.a.createElement("span",null,c.errors.email)),r.a.createElement("p",{className:"bottom"},"Sign Up"),p&&JSON.stringify(o)))}var N=t(6),y=t(15),j=t(16),k=t(22),O=t(18),_=t(17),x=function(e){Object(O.a)(t,e);var a=Object(_.a)(t);function t(e){var n;return Object(y.a)(this,t),(n=a.call(this,e)).handleClickOutside=function(e){if(!e.target.dataset.target&&!e.target.dataset.toggle)return!1;var a=e.target.dataset.target.substring(1);if(!document.getElementById(a))return n.setState(Object(N.a)({},a,{show:!1})),!1;n.setState(Object(N.a)({},a,{show:!0}))},n.state=Object(N.a)({show:!1},n.props.id,!1),n.wrapperRef=r.a.createRef(),n.closeClick=n.closeClick.bind(Object(k.a)(n)),n}return Object(j.a)(t,[{key:"closeClick",value:function(e){var a=e.target.dataset.ref;this.setState(Object(N.a)({},a,{show:!1}))}},{key:"componentDidMount",value:function(){document.addEventListener("click",this.handleClickOutside,!0)}},{key:"componentWillUnmount",value:function(){document.removeEventListener("click",this.handleClickOutside,!0)}},{key:"render",value:function(){var e=this.state[this.props.id].show?"modal flipX open":"modal flipX",a={id:this.props.id,className:e};return r.a.createElement("div",Object.assign({},a,{ref:this.wrapperRef}),r.a.createElement("div",{className:"modal-backdrop"}),r.a.createElement("div",{className:"modal-content"},r.a.createElement("div",{className:"modal-header"},"Hello World",r.a.createElement("button",{className:"close",onClick:this.closeClick,"data-ref":this.props.id},"\xd7")),r.a.createElement("div",{className:"modal-body"},this.props.body),r.a.createElement("div",{className:"modal-footer"})))}}]),t}(n.Component);function S(){return r.a.createElement(r.a.Fragment,null,r.a.createElement("div",{className:"navbar bg-transparent fixed-top"},r.a.createElement("div",{className:"logo"}," ",r.a.createElement("img",{src:i,alt:"logo"})," "),r.a.createElement("ul",{className:"menu"},r.a.createElement("li",null,r.a.createElement(o.b,{to:"/","data-toggle":"modal","data-target":"#home",className:"nav-link"},"Home")),r.a.createElement("li",null,r.a.createElement(o.b,{to:"/","data-toggle":"modal","data-target":"#screens",className:"nav-link"},"Screens")),r.a.createElement("li",null,r.a.createElement(o.b,{to:"/","data-toggle":"modal","data-target":"#aboutus",className:"nav-link"},"AboutUs")),r.a.createElement("li",null,r.a.createElement(o.b,{to:"/","data-toggle":"modal","data-target":"#contactus",className:"nav-link"},"Contact Us"))),r.a.createElement(w,null),r.a.createElement(x,{body:"Home",id:"home"}),r.a.createElement(x,{body:"Screenshot",id:"screens"}),r.a.createElement(x,{body:"About Us",id:"aboutus"}),r.a.createElement(x,{body:"Contact Us",id:"contactus"})))}function C(){return r.a.createElement("div",null,r.a.createElement(S,null))}t(73);function I(){var e="http://criminalimpulse.com/api/events",a=g(),t=a.result,l=a.api,c=a.loading;Object(n.useEffect)((function(){l(e)}),[l]);var o=function(e,a){return Math.floor(Math.random()*(a-e+1))+e},s=c&&t.map((function(e,a){var t={top:o(10,40)+"%",right:o(10,40)+"%",bottom:o(10,40)+"%",marginTop:"10rem"},n={left:o(10,30)+"%",top:o(40,6)+"%"};return r.a.createElement("p",{className:"popup",key:a,"data-tooltip":e,style:a%2===0?n:t})}));return[r.a.createElement("div",{className:"action"},s)]}t(74);var U=function(e){Object(O.a)(t,e);var a=Object(_.a)(t);function t(){var e;Object(y.a)(this,t);for(var n=arguments.length,r=new Array(n),l=0;l<n;l++)r[l]=arguments[l];return(e=a.call.apply(a,[this].concat(r))).state={imageIndex:0},e.setImageIndex=function(){var a=e.state.imageIndex;6===a?a=0:a+=1,e.setState({imageIndex:a})},e}return Object(j.a)(t,[{key:"componentDidMount",value:function(){var e=this;this.loop=setInterval((function(){e.setImageIndex()}),9e3)}},{key:"componentWillUnmount",value:function(){clearInterval(this.loop)}},{key:"render",value:function(){var e=this.state.imageIndex,a=["https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg","https://content.api.news/v3/images/bin/3dad2a36dcd4369995d2cc8ef1d42978","https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg","https://content.api.news/v3/images/bin/3dad2a36dcd4369995d2cc8ef1d42978","https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg","https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg","https://content.api.news/v3/images/bin/3dad2a36dcd4369995d2cc8ef1d42978","https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg","https://content.api.news/v3/images/bin/3dad2a36dcd4369995d2cc8ef1d42978","https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg"];return r.a.createElement("div",{className:"app",id:e},r.a.createElement(I,null),r.a.createElement("img",{src:a[e],className:"w-100 h-100",alt:e}))}}]),t}(n.Component),q=t(30);t(75);function H(){var e=Object(n.useState)("idle"),a=Object(v.a)(e,2),t=(a[0],a[1]),l=Object(n.useState)(!1),c=Object(v.a)(l,2),o=(c[0],c[1]),s=Object(n.useState)(null),i=Object(v.a)(s,2),m=i[0],d=i[1],u=function(){var e=Object(h.a)(f.a.mark((function e(){return f.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return o(!1),t("fetching"),e.next=4,b.a.get("http://criminalimpulse.com/api/topplayerlist").then((function(e){var a;(null===e||void 0===e||null===(a=e.data)||void 0===a?void 0:a.length)&&(d(e.data),console.log("setResponseData: ",e.data)),t("fetched")})).catch((function(e){t("failed"),o(e),console.error(e)}));case 4:case"end":return e.stop()}}),e)})));return function(){return e.apply(this,arguments)}}();return Object(n.useEffect)((function(){u()}),[]),r.a.createElement(r.a.Fragment,null,r.a.createElement("div",{height:"300px",className:"player-left"},r.a.createElement("p",{className:"listHeading"},"Menu Heading"),(null===m||void 0===m?void 0:m.length)?r.a.createElement(q.a,{marqueeItems:m}):r.a.createElement("div",null,"loading...")),",",r.a.createElement("div",{height:"300px",className:"player-right"},r.a.createElement("p",{className:"listHeading"},"Menu Heading"),(null===m||void 0===m?void 0:m.length)?r.a.createElement(q.a,{marqueeItems:m}):r.a.createElement("div",null,"loading...")))}var M=function(){return r.a.createElement("footer",{className:"footer"},"hello footer")};var R=function(){return[r.a.createElement(C,null),r.a.createElement(U,null),r.a.createElement(H,null),r.a.createElement(M,null)]},A=function(e){Object(O.a)(t,e);var a=Object(_.a)(t);function t(){return Object(y.a)(this,t),a.apply(this,arguments)}return Object(j.a)(t,[{key:"submitClick",value:function(){}},{key:"render",value:function(){return r.a.createElement("div",{className:"form-box"},r.a.createElement("div",{className:"sign-in"},r.a.createElement("div",{className:"form-group"},r.a.createElement("label",{for:"email"},"Email"),r.a.createElement("input",{type:"email",name:"email",id:"email",className:"form-control",placeholder:"admin@localhost.dev"})),r.a.createElement("div",{className:"form-group"},r.a.createElement("label",{for:"password"},"Password"),r.a.createElement("input",{type:"password",name:"password",id:"password",className:"form-control",placeholder:"Password"})),r.a.createElement("div",{class:"form-group d-flex"},r.a.createElement("div",{class:"form-check"},r.a.createElement("input",{className:"form-check-input",type:"checkbox",name:"remember",id:"remember"}),r.a.createElement("label",{className:"form-check-label",for:"remember"},"Remember Me")),r.a.createElement("a",{className:"ml-auto",href:"https://djdex.org/password/reset"},"Forgot Your Password?")),r.a.createElement("button",{type:"submit",className:"btn btn-block btn-primary"},"Login")))}}]),t}(n.Component);t(76),t(77),t(78),Boolean("localhost"===window.location.hostname||"[::1]"===window.location.hostname||window.location.hostname.match(/^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/));c.a.render(r.a.createElement(o.a,null,r.a.createElement(s.c,null,r.a.createElement(s.a,{exact:!0,path:"/"},r.a.createElement(R,null)),r.a.createElement(s.a,{path:"/home"},r.a.createElement(R,null)),r.a.createElement(s.a,{path:"/about"},r.a.createElement(R,null)),r.a.createElement(s.a,{path:"/login"},r.a.createElement(A,null)))),document.getElementById("root")),"serviceWorker"in navigator&&navigator.serviceWorker.ready.then((function(e){e.unregister()})).catch((function(e){console.error(e.message)}))}},[[79,1,2]]]);
//# sourceMappingURL=main.06a1ff03.chunk.js.map