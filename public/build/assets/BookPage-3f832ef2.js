import{_ as i,r as _,o as d,c as l,a as s,b as a,w as r,t,d as o}from"./app-e0eaeda8.js";const h={data(){return{book:{}}},mounted(){axios.get("/api/book/"+this.$route.params.id).then(c=>this.book=c.data)}},p={class:"container mt-5 mb-5"},u={class:"row d-flex justify-content-center"},m={class:"col-md-10"},b={class:"card"},k={class:"row"},v={class:"col-md-6"},x={class:"images p-3"},f={class:"text-center p-4"},g=["src"],w={class:"col-md-6"},B={class:"product p-4"},y={class:"d-flex justify-content-between align-items-center"},N={class:"d-flex align-items-center"},P=s("span",{class:"ml-1"},"Back",-1),V={class:"mt-4 mb-1"},j={class:"text-uppercase text-muted brand"},C={class:"text-uppercase"},D={class:"price d-flex flex-row align-items-center"},S=s("br",null,null,-1),E=s("br",null,null,-1),G={class:"about"};function I(c,T,q,z,e,A){const n=_("router-link");return d(),l("div",p,[s("div",u,[s("div",m,[s("div",b,[s("div",k,[s("div",v,[s("div",x,[s("div",f,[s("img",{id:"main-image",src:e.book.image,width:"250"},null,8,g)])])]),s("div",w,[s("div",B,[s("div",y,[s("div",N,[a(n,{to:"/"},{default:r(()=>[P]),_:1})])]),s("div",V,[s("span",j,t(e.book.publisher),1),s("h5",C,t(e.book.title),1),s("div",D,[s("p",null,[o("Genre: "+t(e.book.genre),1),S,o(" ISBN: "+t(e.book.isbn),1),E,o(" Publish Date: "+t(e.book.published),1)])])]),s("p",G,t(e.book.description),1)])])])])])])])}const H=i(h,[["render",I]]);export{H as default};
