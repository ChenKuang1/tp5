import Vue from 'vue'
import { Button,Form,FormItem,Input,Message,Container,Header,Main,Footer,Aside,
    Menu,Submenu,MenuItem,MenuItemGroup,Dropdown,DropdownItem,DropdownMenu,Table,TableColumn,
    Breadcrumb,BreadcrumbItem,Card,Pagination,Dialog,MessageBox,Switch,Col,Row} from 'element-ui'

Vue.use(Button)
Vue.use(Form)
Vue.use(FormItem)
Vue.use(Input)
Vue.use(Container)
Vue.use(Header)
Vue.use(Main)
Vue.use(Footer)
Vue.use(Aside)
Vue.use(Menu)
Vue.use(Submenu)
Vue.use(MenuItem)
Vue.use(MenuItemGroup)
Vue.use(Dropdown)
Vue.use(DropdownItem)
Vue.use(DropdownMenu)
Vue.use(Table)
Vue.use(TableColumn)
Vue.use(Breadcrumb)
Vue.use(BreadcrumbItem)
Vue.use(Card)
Vue.use(Pagination)
Vue.use(Dialog)
Vue.use(Switch)
Vue.use(Col)
Vue.use(Row)


Vue.prototype.$message = Message
Vue.prototype.$confirm = MessageBox.confirm