"use strict";(self.webpackChunkrealCookieBanner_=self.webpackChunkrealCookieBanner_||[]).push([[217],{93160:(e,t,a)=>{a.d(t,{W5:()=>n,gt:()=>r});var n=function(e){return e.Consent="consent",e.LegitimateInterest="legitimate-interest",e.LegalRequirement="legal-requirement",e}(n||{}),r=function(e){return e.ProviderIsSelfCertifiedTransAtlanticDataPrivacyFramework="provider-is-self-certified-trans-atlantic-data-privacy-framework",e.StandardContractualClauses="standard-contractual-clauses",e}(r||{})},63736:(e,t,a)=>{a.d(t,{r:()=>s});var n=a(31643),r=a(49114),o=a(60204);const s=e=>{let{url:t,style:a,label:s}=e;const{__:i}=(0,o.Q)(),c={cursor:"pointer",...a};return React.createElement(n.Z,{style:c,onClick:()=>window.open(t,"_blank")},React.createElement(r.Z,null)," ",s||i("Learn more"))}},77874:(e,t,a)=>{a.d(t,{s:()=>d});var n=a(70045),r=a(77419),o=a(86459),s=a(84106),i=a(46270),c=a(24519),l=a(86886),u=a(87363);const d=e=>{let{languages:t=[],recordId:a,onClick:d,children:m,wrapperProps:h={},...p}=e;const[f,g]=(0,u.useState)(!1),y=t.filter((e=>{let{id:t}=e;return!1!==t})),v=t.filter((e=>{let{id:t}=e;return!1===t})),b={size:13,shape:"square",style:{display:"block",width:"auto",borderRadius:5}},k={flex:"none",style:{textAlign:"center",paddingRight:5,fontSize:11,cursor:"pointer"}},w=(0,u.useCallback)((async e=>{if(!f){g(!0);try{d(a,e)}finally{g(!1)}}}),[f,d,a]);return React.createElement(n.Z,(0,i.Z)({spinning:f},h),React.createElement(r.Z,(0,i.Z)({align:"middle"},p),y.map((e=>{const{code:t,flag:n,id:r}=e;return r===a?null:React.createElement(o.Z,(0,i.Z)({key:t},k,{onClick:()=>w(e)}),React.createElement(s.C,(0,i.Z)({src:n},b),t.toUpperCase()),React.createElement(c.Z,null))})),v.length>0&&v.map((e=>{const{code:t,flag:a}=e;return React.createElement(o.Z,(0,i.Z)({key:t},k,{onClick:()=>w(e)}),React.createElement(s.C,(0,i.Z)({src:a},b),t.toUpperCase()),React.createElement(l.Z,null))})),m))}},36435:(e,t,a)=>{a.d(t,{C:()=>r});var n=a(74943);const r=e=>{let{children:t,description:a,extra:r,offset:o}=e;return React.createElement(n.Z.Item,{wrapperCol:{offset:o},style:{borderBottom:"1px solid #e7e7e7"}},React.createElement("h3",{style:{margin:`0 0 ${a?3:15}px 0`}},t),!!a&&React.createElement("p",{className:"description",style:{marginBottom:15}},a),r)}},6880:(e,t,a)=>{a.d(t,{Or:()=>n});const n={labelCol:{span:6},wrapperCol:{span:16}}},50435:(e,t,a)=>{a.d(t,{S$:()=>n});const n="https://assets.devowl.io/in-app/wp-real-cookie-banner/"},68384:(e,t,a)=>{a.d(t,{h:()=>l,u:()=>d});var n=a(12717),r=a(84106),o=a(15602),s=a(87363),i=a(50435),c=a(60204);const l=`${i.S$}cookie-experts.svg`,u=["niklas.moselewski","mario.guenter","matthias.guenter","jan.karres"];function d(){const{__:e}=(0,c.Q)();return{openDialog:(0,s.useCallback)((()=>{o.Z.info({icon:void 0,width:500,closable:!0,okButtonProps:{style:{display:"none"}},content:React.createElement("div",{style:{textAlign:"center"}},React.createElement("img",{src:l,style:{display:"block",paddingTop:15,margin:"auto",height:176}}),React.createElement("h3",{style:{margin:"10px 0 0"}},"Cookie Experts"),React.createElement("p",{style:{marginTop:0}},e("Let our team help you with the setup")),React.createElement(n.Z,null,React.createElement(r.C.Group,{size:"large"},u.map((e=>React.createElement(r.C,{key:e,src:`${i.S$}cookie-experts-faces/${e}.jpeg?v=3`}))))),React.createElement("a",{href:e("https://devowl.io/wordpress-real-cookie-banner/cookie-experts/"),target:"_blank",rel:"noreferrer",className:"button button-large button-primary"},e("Get help from Cookie Experts")),React.createElement("p",null,e("We admit, it is not easy to find all the services, cookies, etc. The legal requirements in the EU are quite complex for many website operators. We can understand if you feel overwhelmed - if this goes far beyond what you can technically do. After you know what all has to be considered, the question of how to make your website privacy compliant does not let you sleep peacefully either.")),React.createElement("p",null,e("Don't worry, we have a solution for you! Our Cookie Experts have already set up many cookie banners and know exactly what they are doing. They can also set up your cookie banner quickly and easily. So, we can simply take this worry away from you.")),React.createElement("a",{style:{marginTop:10,textDecoration:"underline",display:"inline-block",cursor:"pointer"},onClick:()=>o.Z.destroyAll()},e("Close")))})}),[])}}},17085:(e,t,a)=>{a.d(t,{f:()=>m});var n=a(10022),r=a(74943),o=a(87363),s=a.n(o),i=a(15602),c=a(31540),l=a(35977),u=a(60204);const d=e=>{let{when:t,title:a}=e;const{__:n}=(0,u.Q)(),[r,d=""]=(0,o.useMemo)((()=>a.split(".").map((e=>`${e.trim()}.`))),[a]);return s().createElement(l.ZP,{when:t},(e=>{let{isActive:t,onConfirm:a,onCancel:o}=e;return s().createElement(i.Z,{open:t,onCancel:o,onOk:a,centered:!0,okText:n("Leave"),cancelText:n("Cancel")},s().createElement(c.ZP,{status:"warning",title:r,subTitle:d}))}))};function m(e){let{isEdit:t,defaultValues:a,template:s,entityTemplateVersion:i,attributes:c,handleSave:l,i18n:u,initialHasChanges:m,trackFieldsDifferFromDefaultValues:h=[],unloadPromptWhen:p}=e;const f={...a,...c||{}},[g]=r.Z.useForm(),[y,v]=(0,o.useState)(!1),[b,k]=(0,o.useState)(m||!1),w=!(!t||!s)&&i!==s.version,R=!!s&&(w||!t),E=[],_=(0,o.useCallback)((async e=>{v(!0);try{await l(e),g.resetFields(),n.ZP.success(u.successMessage),k(!1)}catch(e){n.ZP.error(e)}finally{v(!1)}}),[g,l]),C=(0,o.useCallback)((()=>{n.ZP.error(u.validationError)}),[g,u]),T=React.createElement(d,{when:e=>b&&(!p||p(e)),title:m&&u.unloadConfirmInitialActive?u.unloadConfirmInitialActive:u.unloadConfirm}),x=(0,o.useCallback)(((e,t)=>{if(h&&f){E.splice(0,E.length);for(const e of h)t[e]!==f[e]&&E.push(e)}k(!0)}),[h,f]);return{defaultValues:f,template:s,isEdit:t,isTemplateUpdate:w,templateCheck:R,form:g,isBusy:y,setIsBusy:v,hasChanges:b,hasTrackedFieldDifferenceToDefaultValue:e=>E.indexOf(e)>-1,onFinish:_,onFinishFailed:C,prompt:T,onValuesChange:x}}},25114:(e,t,a)=>{a.d(t,{Y:()=>s});var n=a(93160),r=a(76376),o=a(87363);function s(e){let{__:t,_i:a}=e;return(0,o.useMemo)((()=>{const e=[{label:React.createElement(React.Fragment,null,t("I have concluded standard contractual clauses with the provider"),React.createElement("p",{className:"description"},a(t("Did you sign a contract with the provider, e.g. when registering online? If so, the contract may contain {{a}}standard contractual clauses{{/a}} of the EU, which promise secure data processing in insecure third countries."),{a:React.createElement("a",{href:t("https://commission.europa.eu/publications/standard-contractual-clauses-controllers-and-processors-eueea_en"),rel:"noreferrer",target:"_blank"})}))),value:n.gt.StandardContractualClauses},{label:React.createElement(React.Fragment,null,t("Provider is self-certified in accordance with the Trans-Atlantic Data Privacy Framework for secure data processing in the USA"),React.createElement("p",{className:"description"},a(t('The adequacy decision for secure data processing only applies if the provider is self certified and included in the "Data Privacy Framework List". To find out which companies are certified, {{a}}visit the website of the US government{{/a}}.'),{a:React.createElement("a",{href:t("https://www.dataprivacyframework.gov/s/participant-search/"),rel:"noreferrer",target:"_blank"})}))),value:n.gt.ProviderIsSelfCertifiedTransAtlanticDataPrivacyFramework}];return{specialTreatments:e,bySelectedCountries:(t,a)=>{const o=(0,r.DO)({dataProcessingInCountries:t,safeCountries:a});return{unsafeCountries:o,specialTreatmentOptions:e.filter((e=>{let{value:a}=e;switch(a){case n.gt.ProviderIsSelfCertifiedTransAtlanticDataPrivacyFramework:return t.indexOf("US")>-1;case n.gt.StandardContractualClauses:return o.length>0;default:return!0}}))}}}}),[])}},76376:(e,t,a)=>{a.d(t,{DO:()=>o,XO:()=>s}),a(87363);var n=a(22255),r=a(93160);function o(e){let{dataProcessingInCountries:t,safeCountries:a,specialTreatments:o=[],designVersion:s=n.R}=e;const i=s>4?o:[];return t.filter((e=>!(i.indexOf(r.gt.StandardContractualClauses)>-1)&&(-1===a.indexOf(e)||"US"===e&&-1===i.indexOf(r.gt.ProviderIsSelfCertifiedTransAtlanticDataPrivacyFramework))))}function s(){return{http:{name:"HTTP Cookie",abbr:"HTTP",backgroundColor:"black"},local:{name:"Local Storage",abbr:"Local",backgroundColor:"#b3983c"},session:{name:"Session Storage",abbr:"Session",backgroundColor:"#3c99b3"},indexedDb:{name:"IndexedDB",abbr:"I-DB",backgroundColor:"#4ab33c"}}}},22255:(e,t,a)=>{a.d(t,{R:()=>n});const n=7},39050:(e,t,a)=>{a.d(t,{e:()=>r});var n=a(87363);function r(e,t){const a=e.filter(Boolean);return 0===a.length?null:a.reduce(((e,a,r)=>e.length?[...e,React.createElement(n.Fragment,{key:r},t),a]:[a]),[])}},12053:(e,t,a)=>{a.d(t,{e:()=>o});var n=a(8700);const r={path:"/:objectType/multilingual/copy",namespace:"wp/v2",method:n.RouteHttpVerb.POST};async function o(e,t,a){const{root:o,nonce:s}=window.wpApiSettings,{translations:i}=await(0,n.commonRequest)({location:r,options:{restRoot:o,restNonce:s,restNamespace:"wp/v2",restQuery:{}},request:{id:t,targetLocale:a},params:{objectType:e}});return i[a]}},45567:(e,t,a)=>{a.d(t,{f:()=>n});const n=e=>{let{children:t,maxWidth:a="auto",style:n={}}=e;return React.createElement("div",{className:"rcb-config-content",style:{maxWidth:"fixed"===a?1300:a,...n}},t)}},36157:(e,t,a)=>{a.d(t,{v:()=>p});var n=a(77419),r=a(86459),o=a(12717),s=a(64041),i=a(91283),c=a(68384),l=a(63736),u=a(49048),d=a(40045),m=a(48488),h=a.n(m);function p(e){const{optionStore:{isTcf:t,consentsDeletedAt:a,consentDuration:m}}=(0,u.m)();switch(e){case"scanner":{const{openDialog:e}=(0,c.u)();return React.createElement(React.Fragment,null,React.createElement("p",{className:"description"},(0,d.__)("The scanner finds services that you use on your website that might set/read cookies or process personal data. This is e.g. Google Analytics, YouTube or Elementor. If there is no template for a service, you will see from which external URLs content, scripts etc. are embedded. This allows you to set up your cookie banner quickly and easily.")),React.createElement("p",{className:"description"},(0,d._i)((0,d.__)("We explicitly do not find cookies because that would not work reliably. {{a}}We explained why in our knowledge base.{{/a}}"),{a:React.createElement("a",{rel:"noreferrer",href:(0,d.__)("https://devowl.io/knowledge-base/real-cookie-banner-cookie-scanner-finds-cookies-automatically/"),target:"_blank"})})),React.createElement(n.Z,{style:{margin:"10px 0"}},React.createElement(r.Z,{span:11},React.createElement("div",{style:{paddingRight:10}},React.createElement(o.Z,null,(0,d.__)("What the scanner finds ...")),[(0,d.__)("External services (with and without template)"),(0,d.__)("WordPress plugins with templates that require consent"),(0,d.__)("Automatic check of all subpages of your website")].map(((e,t)=>React.createElement("div",{key:t,style:{marginBottom:10}},React.createElement(s.Z,{twoToneColor:"#52c41a"}),"  ",e))))),React.createElement(r.Z,{span:2,style:{textAlign:"center"}},React.createElement(o.Z,{type:"vertical",style:{height:"100%"}})),React.createElement(r.Z,{span:11},React.createElement("div",null,React.createElement(o.Z,null,(0,d.__)("... and what it does not")),[(0,d.__)("Cookies from unknown WordPress plugins"),(0,d.__)("Services embedded after the page load via JavaScript"),(0,d.__)("Complete coverage of your individual use case")].map(((e,t)=>React.createElement("div",{key:t,style:{marginBottom:10}},React.createElement(i.Z,{twoToneColor:"#eb2f96"}),"  ",e)))))),React.createElement("p",{className:"description"},(0,d._i)((0,d.__)("Just by using the scanner, you will not set up your cookie banner one hundred percent correctly. If it is too complex or time-consuming for you to set up the cookie banner yourself, just let one of our {{a}}cookie experts{{/a}} set it up for you!"),{a:React.createElement("a",{style:{textDecoration:"underline",cursor:"pointer"},onClick:e})})))}case"cookie":return React.createElement(React.Fragment,null,(0,d.__)("What are services? Services can be external applications such as Google Analytics or WordPress plugins or themes that process personal data (e.g. IP address) and/or set cookies. Cookies (and similar technologies) are small text files that are stored on the device of visitors to your website. You can store information about the visitor in cookies, such as the website's language, or unique advertising IDs to display personalized advertising. You, as the site owner, must ensure that cookies are only placed on your visitors' devices and personal data are only processed if they have given their explicit consent. Unless you have a legitimate interest in the legal sense to do so even without consent. You can define here all the services you use and their cookies with their legal and technical information.")," ",React.createElement(l.r,{url:(0,d.__)("https://devowl.io/2021/web-cookies-overview/")}));case"blocker":return(0,d.__)("What is a content blocker? Imagine that a user of your website does not accept all services. At the same time, you have integrated e.g. a YouTube video that sets cookies that the visitor has not agreed to. According to the ePrivacy Directive, this is prohibited. Content blockers automatically replace iframes, script and link tags like YouTube videos for such users and offer them to watch the video as soon as they agree to load it.");case"list-of-consents":return(0,d._i)((0,d.__)("Consents are automatically documented in order to be able to prove compliance with the legal requirements according to {{a}}Art. 5 GDPR{{/a}} and, in case of dispute, to prove how the consent was obtained."),{a:React.createElement("a",{href:(0,d.__)("https://gdpr-text.com/read/article-5/"),target:"_blank",rel:"noreferrer"})});case"consents-deleted":return React.createElement(React.Fragment,null,a?(0,d.__)("Consents before %s has been automatically deleted according to the settings you have made.",h()(a).subtract(m,"months").toDate().toLocaleString(document.documentElement.lang)):null);case"shortcodes":return React.createElement(React.Fragment,null,(0,d._i)((0,d.__)("Your website visitors must be able to view their consent history, change their consent, or withdraw their consent at any time. This must be as easy as giving consent. Therefore, the legal links must be included on every subpage of the website (e.g. in the footer)."),{strong:React.createElement("strong",null)}),React.createElement("br",null),React.createElement("br",null),(0,d._i)((0,d.__)("Hiding these options, e.g. in the privacy policy, is in the opinion of multiple data protection authorities in the EU a violation of the GDPR."),{a:React.createElement("a",{href:(0,d.__)("https://www.datenschutzkonferenz-online.de/media/oh/20211220_oh_telemedien.pdf"),target:"_blank",rel:"noreferrer"})}),t?React.createElement(React.Fragment,null,React.createElement("br",null),React.createElement("br",null),(0,d.__)("To meet the requirements of the TCF standard, the shortcodes should be placed near the link to the privacy policy.")):null);case"tcf-vendor":return(0,d._i)((0,d.__)("What is a TCF vendor? According to the IAB Europe Transparency and Consent Framework (TCF), any service (e.g. Google for Google Ads) that wants to use consents according to the TCF standard must register as a vendor in the {{a}}Global Vendor List (GVL){{/a}}. All TCF vendors specify for which purposes they need consent to process data and set cookies and which features they can offer with these consents. They also provide a link to their privacy policy for further information. You, as a website operator, must obtain consent in your cookie banner for all vendors you work with. You can limit the requested purposes of vendors to keep consents as privacy-friendly as possible."),{a:React.createElement("a",{href:(0,d.__)("https://iabeurope.eu/vendor-list-tcf/"),target:"_blank",rel:"noreferrer"})});case"import":return React.createElement(React.Fragment,null,(0,d.__)("You can export and import all or only some of the settings you made in Real Cookie Banner. If you have several websites, you can save a lot of time by transferring the settings comfortably."),React.createElement("br",null),React.createElement("br",null),(0,d.__)("Also, you can export documented consents to save them in a local backup."));default:return""}}}}]);
//# sourceMappingURL=https://sourcemap.devowl.io/real-cookie-banner/4.1.2/36d8a5c7b789b4e25e787b08d6cfd943/217.lite.js.map