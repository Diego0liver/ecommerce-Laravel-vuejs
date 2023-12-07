export default{
    auth(to, from, next){
      const tokenGet = localStorage.getItem('authToken');
      if(!tokenGet){
        next('/login')
      }
      next()
    },

    authAdmin(to, from, next){
      const tokenGetAdmin = localStorage.getItem('authToken');
      if(!tokenGetAdmin){
        next('/admin')
      }
      next()
    }
}