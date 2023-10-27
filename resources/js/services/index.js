export default{
    auth(to, from, next){
      const tokenGet = localStorage.getItem('authToken');
      if(!tokenGet){
        next('/login')
      }
      next()
    }
}