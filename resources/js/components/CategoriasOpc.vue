<template>
     <ul class="opcoes">
            <RouterLink to="/categoria/pc">
            <li class="listaOpcoes">
            <img src="../../../public/img/logos/pc.png" alt="pc">PC's
            </li>
           </RouterLink>
           <RouterLink to="/categoria/notebook">
            <li class="listaOpcoes">
            <img src="../../../public/img/logos/not.png" alt="notebook">NoteBook's
            </li>
           </RouterLink>
           <RouterLink to="/categoria/acessorios">
            <li class="listaOpcoes">
            <img src="../../../public/img/logos/fone.png" alt="notebook">Acessorios
            </li>
          </RouterLink>
        </ul>
</template>

<style scoped>
  .opcoes{
      display: flex;
      justify-content: center;
      margin: 10px;
   }
   .listaOpcoes{
    display: flex;
    flex-direction: column;
    text-align: center;
    margin-left: 10px;
    list-style: none;
    background-color: #666666;
    color: white;
    padding: 15px;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;
    border: rgb(255, 255, 255) solid 1px;
   }
   .listaOpcoes:hover{
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
   }
</style>