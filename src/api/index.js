import http from '../utils/request'

//请求数据接口
export const getData = () => {
    //返回一个promis对象
    return http.post('/getdata/buy')
}