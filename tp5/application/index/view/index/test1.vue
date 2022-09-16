<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vue 测试实例 - 菜鸟教程(runoob.com)</title>
    <script src="/static/vue/vue.js"></script>
    <script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
    <script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
    <script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
    <script src="https://cdn.staticfile.org/vue-router/2.7.0/vue-router.min.js"></script>
    <style>
        /* 可以设置不同的进入和离开动画 */
        /* 设置持续时间和动画函数 */
        .fade-enter-active, .fade-leave-active {
            transition: opacity 3s
        }
        .fade-enter, .fade-leave-to /* .fade-leave-active, 2.1.8 版本以下 */ {
            opacity: 0
        }
    </style>
</head>
<body>
<div id="app">
    <div v-html="message"></div>
</div>
<div id="a" >
    <button v-on:click="count+=1">增加1</button>
    <p>{{count}}</p>
</div>

<div id="b" v-if="ok">
    <button>显示</button>
    <p>{$arr.a}</p>
</div>
<div id="c" value="6666">
    <input type="button" v-on:click="post()" value="异步">
    <p>{{ax}}</p>
</div>
<div id="d">
    <input type="button" v-on:click="post()" value="异步2">
    <p>{{axs}}</p>
</div>
<div id="e">
    <div v-if="Math.random() > 0.5">
        <p>{{axs}}</p>
    </div>
    <div v-else-if="a == 'a'">aaa</div>
    <div v-else>111</div>
</div>
<div id="f">
<ul>
    <template v-for="site in sites">
        <li>{{ site.name }}</li>
        <li>--------------</li>
    </template>
</ul>
</div>
<div id="h">
    <ul>
        <li v-for="(val,k) in arr">
            {{k}}:{{val}}
        </li>
    </ul>
</div>
<div id="i">
    <p :value='m'>{$arr.a}</p>
    <p>{{m}}</p>
</div>
<div id="j">
    <input v-model="mes"><br>
    <child v-bind:message="mes"></child>
</div>
<div id="k">
    <base-checkbox v-model="lovingVue"></base-checkbox>
    <div v-show="lovingVue">
        如果选择框打勾我就会显示。
    </div>
</div>
<div id="l">
    <my-comp v-bind:message="mes"></my-comp>
</div>
<div id="m">
    <my-comp v-bind:message="mes"></my-comp>
</div>
<div id="n">

    <router-link to="/foo">foo</router-link>
    <router-link to="/bar">bar</router-link>
    <router-view></router-view>
</div>
<div id="o">
    <button v-on:click="show = !show">点击</button>
    <transition name="fade"> <p v-show="show" v-bind:style="obj">asdfghh</p></transition>
</div>
<script>
    new Vue({
        el:"#o",
        data:{
            show:true,
            obj:{
                fontSize:'50px',
                color:'blue'
            }
        }
    })
    //1.定义组件
    const  foo = { template:'<p>foo</p>>'}
    const  bar = { template:'<p>bar</p>'}
    //2.定义路由
    const routes =[
        {path:'/foo',component:foo},
        {path:'/bar',component:bar}
    ]
    //3.创建路由实例
    const router = new VueRouter({
        routes
    })
    //4.创建和挂载实例
    const n = new Vue({
        router
    }).$mount('#n')


    //props验证
    Vue.component('my-comp', {
        props: {
            message:String
        },
        template:'<h3>{{message}}123345354</h3>'
        }
    )
    new Vue({
        el:'#l',
        data: {
            mes : 'sasfa'
        }
    })

    // 注册
    Vue.component('base-checkbox', {

        model: {
            prop: 'checked',
            event: 'change'  // onchange 事件
        },
        props: {
            checked: Boolean
        },

        template: `
    <input
      type="checkbox"
      v-bind:checked="checked"
      v-on:change="$emit('change', $event.target.checked)"
    >
  `
    })
    // 创建根实例
    new Vue({
        el: '#k',
        data: {
            lovingVue: true
        }
    })
    Vue.component('child',{
        props : ['message'],
        template: '<h1>{{message}}</h1>'
    })
    new Vue({
        el:'#j',
        data:{
            mes: 'fuck'
        }
    })
    const co = document.getElementById('i').innerText;
    alert(document.getElementById('i').innerText);
    new Vue({
        el:'#i',
        data:{
            m:'1'
        },
        mounted:function (){document.get
            console.log(document.getElementById('i').innerText)
    }
    })
    new Vue({
        el:'#h',
        data:{
            arr:{
                a:'a',
                b:'b',
                c:'c'
            }
        }
    })
    new Vue({
        el:'#f',
        data:{
            sites:[
                {name:'a'},
                {name:'b'},
                {name:'c'}
            ]
        }
    })
    new Vue({
        el:'#e',
        data:{
            axs:'2',
            a:'b'
        }
    })
    new Vue({
        el:'#d',
        data:{
            axs:'1'
        },
        methods: {
            post:function () {
                axios.post('/index/index/test2', {name: 'test', url: 'www.aaa.com'})
                    .then(res=>{
                        //alert(res);
                        this.axs = res.data.a+res.data.b;
                        //let data1 = JSON.stringify(res);
                        //alert(data1);
                        //alert(res.data.a);
                        //alert(res.data.success);
                        data1=JSON.stringify(res);
                        alert(data1);
                    })
                    .catch(err=>{
                        res.message;
                    })
            }
        }
    })

    new Vue({
        el: '#app',
        data: {
            message: '<h1>666</h1>'
        }
    })
    new Vue({
        el: '#a',
        data:{
            count: 0
        }
    })
    new Vue({
        el:'#b',
        data:{
            ok:true,
            seen:true
        }
    })
    window.onload = function() {
        var vm =  new Vue({
            el: '#c',
            data: {
                count: 0,
                ax: '1'
            },
            methods: {
                post: function () {
                    this.$http.post('/public/index/index/test2', {name: 'test', url: 'www.aaa.com'},{emulateJSON:true})
                        .then(function (res) {
                            alert(this.ax);
                            data1=JSON.stringify(res);
                            alert(data1);
                            alert(res.body);
                            //alert(res.body.success);
                            this.ax=res.body.success;
                        }, function (res) {
                            console.log(res.status);
                        });
                }

            }
        })
    }
</script>
</body>
</html>