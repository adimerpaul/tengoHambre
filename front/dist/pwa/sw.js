if(!self.define){let e,s={};const a=(a,f)=>(a=new URL(a+".js",f).href,s[a]||new Promise((s=>{if("document"in self){const e=document.createElement("script");e.src=a,e.onload=s,document.head.appendChild(e)}else e=a,importScripts(a),s()})).then((()=>{let e=s[a];if(!e)throw new Error(`Module ${a} didn’t register its module`);return e})));self.define=(f,c)=>{const i=e||("document"in self?document.currentScript.src:"")||location.href;if(s[i])return;let n={};const d=e=>a(e,i),r={module:{uri:i},exports:n,require:d};s[i]=Promise.all(f.map((e=>r[e]||d(e)))).then((e=>(c(...e),n)))}}define(["./workbox-57ffaad5"],(function(e){"use strict";e.setCacheNameDetails({prefix:"tengo"}),self.skipWaiting(),e.clientsClaim(),e.precacheAndRoute([{url:"305279152_459467216196549_685032330942262268_n.jpg",revision:"d37af9b8ac134ae03cc5ee3e9c521901"},{url:"305279152_459467216196549_685032330942262268_n.png",revision:"0fddf6d575646cbea98c767b9a4b16c3"},{url:"assets/_commonjsHelpers.2cf1d77b.js",revision:"edbf344080ddf4b133d93f50d6de44b5"},{url:"assets/axios.3f85bef1.js",revision:"bf8560cd0f041df90d720d014daf40c5"},{url:"assets/ErrorNotFound.232dd445.js",revision:"082987190eb9c30fc71ceb24467599bc"},{url:"assets/fa-brands-400.20c4a58b.ttf",revision:"0ab3921d9b80975c5597432ab59f5d0a"},{url:"assets/fa-brands-400.74833209.woff2",revision:"8b0ddedbb27cbc9971c8667caa8a0cc1"},{url:"assets/fa-regular-400.528d022d.ttf",revision:"20206738b2bffb741b00200d5d3d6d20"},{url:"assets/fa-regular-400.8e7e5ea1.woff2",revision:"61f30b79daf5b31f0d254a31fba66158"},{url:"assets/fa-solid-900.67a65763.ttf",revision:"e2ceb83946c9e5fc7eab24453a03bffb"},{url:"assets/fa-solid-900.7152a693.woff2",revision:"c64278386c2bbb5e293e11b94ca2f6d1"},{url:"assets/fa-v4compatibility.0515a423.ttf",revision:"d20cedd7e254d4b58b721b6995ca52b4"},{url:"assets/fa-v4compatibility.694a17c3.woff2",revision:"4bc58bc16bb05a05d3a47a4f7e143b75"},{url:"assets/flUhRq6tzZclQEJ-Vdg-IuiaDsNa.fd84f88b.woff",revision:"3e1afe59fa075c9e04c436606b77f640"},{url:"assets/flUhRq6tzZclQEJ-Vdg-IuiaDsNcIhQ8tQ.4a4dbc62.woff2",revision:"a4160421d2605545f69a4cd6cd642902"},{url:"assets/gok-H7zzDkdnRel8-DQ6KAXJ69wP1tGnf4ZGhUcel5euIg.35dca8a7.woff2",revision:"0ba49c096a77b67734434cebcaf2e14d"},{url:"assets/gok-H7zzDkdnRel8-DQ6KAXJ69wP1tGnf4ZGhUcY.8e94758c.woff",revision:"0e4321a7c0dda51d72a669ac5892fc39"},{url:"assets/html2canvas.esm.0eae2bf4.js",revision:"57e52999e4fe32560f4d4f7cb3c65b94"},{url:"assets/index.40ad7500.js",revision:"622d610e0de883ee3e5962ffe782cc1a"},{url:"assets/index.472b6812.css",revision:"e1a3127ecc6959a0111e958da2ea11a1"},{url:"assets/index.es.b00d68d2.js",revision:"b532ca005e600bbdadb2ee4780b7b48d"},{url:"assets/KFOkCnqEu92Fr1MmgVxIIzQ.34e9582c.woff",revision:"4aa2e69855e3b83110a251c47fdd05fc"},{url:"assets/KFOlCnqEu92Fr1MmEU9fBBc-.9ce7f3ac.woff",revision:"40bcb2b8cc5ed94c4c21d06128e0e532"},{url:"assets/KFOlCnqEu92Fr1MmSU5fBBc-.bf14c7d7.woff",revision:"ea60988be8d6faebb4bc2a55b1f76e22"},{url:"assets/KFOlCnqEu92Fr1MmWUlfBBc-.e0fd57c0.woff",revision:"0774a8b7ca338dc1aba5a0ec8f2b9454"},{url:"assets/KFOlCnqEu92Fr1MmYUtfBBc-.f6537e32.woff",revision:"bcb7c7e2499a055f0e2f93203bdb282b"},{url:"assets/KFOmCnqEu92Fr1Mu4mxM.f2abf7fb.woff",revision:"d3907d0ccd03b1134c24d3bcaf05b698"},{url:"assets/Montserrat-VariableFont_wght.d2f99d4d.ttf",revision:"0862772643ff65b7a76ef8cde6c26eae"},{url:"assets/purify.es.de52fd0e.js",revision:"75f7266fd58e409296312932bdf0c0b5"},{url:"descarga.jpg",revision:"5f47c7a2d115015db37a5af9dc2eabf1"},{url:"favicon.ico",revision:"5b78095fb34d1e5f973b14de7c4ccb57"},{url:"icons/apple-icon-120x120.png",revision:"5998bdf9167f4c30938783d752115b03"},{url:"icons/apple-icon-152x152.png",revision:"149c60a2d63c7a4570b6678b0981c6f5"},{url:"icons/apple-icon-167x167.png",revision:"ef127ca422b8b2f21319245dd3a091b2"},{url:"icons/apple-icon-180x180.png",revision:"8d213e3374952f64e0acbaf4db56d24c"},{url:"icons/apple-launch-1125x2436.png",revision:"c493ea00f5018ef0315ad747da6fb0f5"},{url:"icons/apple-launch-1170x2532.png",revision:"8b35a2e06c91fd6733d26c99768a1053"},{url:"icons/apple-launch-1242x2208.png",revision:"0feb9d2f978bf21423af75b97f10d5bd"},{url:"icons/apple-launch-1242x2688.png",revision:"69bbf37f86635b22c1b8499129bb391b"},{url:"icons/apple-launch-1284x2778.png",revision:"485bd75cb15d85379f644693a2246a83"},{url:"icons/apple-launch-1536x2048.png",revision:"55216d2a54e55ae5eb1b0d64654721d7"},{url:"icons/apple-launch-1620x2160.png",revision:"19ea15853b597c474a039fdb61eb3583"},{url:"icons/apple-launch-1668x2224.png",revision:"e5f37d02b582f0c6126fe324286dd333"},{url:"icons/apple-launch-1668x2388.png",revision:"30b077dd44645029a6439494d70f6a5e"},{url:"icons/apple-launch-2048x2732.png",revision:"c98537ff84d944de938ee2983fae1961"},{url:"icons/apple-launch-750x1334.png",revision:"9161dad34c2ea4cb61e9f670ab39df1b"},{url:"icons/apple-launch-828x1792.png",revision:"65f8aaff023b2ce356622617513e08b6"},{url:"icons/favicon-128x128.png",revision:"7c90ed273f1d721e19f2f1a2801745e9"},{url:"icons/favicon-16x16.png",revision:"00bea7686e715d0f521433cf1aac6488"},{url:"icons/favicon-32x32.png",revision:"a61a3e1e509016f295422f8e2f3478fb"},{url:"icons/favicon-96x96.png",revision:"578a4b6f87a49bffd7ca6a0485eaef6c"},{url:"icons/icon-128x128.png",revision:"7c90ed273f1d721e19f2f1a2801745e9"},{url:"icons/icon-192x192.png",revision:"282c62c7a01971f464f61009a1f4db7c"},{url:"icons/icon-256x256.png",revision:"63fe5a476859f8b927ec3457cd0927c7"},{url:"icons/icon-384x384.png",revision:"f18f5a6e5458b86ed56b31af85eff4e9"},{url:"icons/icon-512x512.png",revision:"d0cc46bd077d38015b36ee3f02f8f7fa"},{url:"icons/ms-icon-144x144.png",revision:"9cdd05fc94c70975cec64c252a34f784"},{url:"icons/safari-pinned-tab.svg",revision:"a307406bd0f348a91d8fbfe7bdf2b784"},{url:"index.html",revision:"94b630999efae6dded925c959881f848"},{url:"logo.png",revision:"00fd6b7feb18cdd6eecba134fce7b918"},{url:"manifest.json",revision:"6e8d5e55787ae4bd5ab106bbbdefe998"}],{}),e.cleanupOutdatedCaches(),e.registerRoute(new e.NavigationRoute(e.createHandlerBoundToURL("index.html"),{denylist:[/sw\.js$/,/workbox-(.)*\.js$/]}))}));
