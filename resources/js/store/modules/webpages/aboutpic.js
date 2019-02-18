
//permission

const state = {
    aboutpic:[],//get one as super admin from one organisation
    aboutpics:[], //get all assuper admin fromallorganisations
    singleaboutpic:[],
  },
  getters = {
    AboutPic(state){
      return state.aboutpic;
    },
    AboutPics(state){
      return state.aboutpics;
    },
    SingleAbouPic(state){
        return state.singleaboutpic
    },
  }
const actions = {
    aboutpic(context){
        axios.get('/aboutpic/get')//based on authethicated id
        .then((response)=>{
          console.log(response.data);
          context.commit('aboutpic', response.data.aboutpic); //based on authethicated id
        })
    },
    aboutpics(context){
        axios.get('/aboutpics/get')
        .then((response)=>{
        //   console.log(response.data.aboutpics);
          context.commit('aboutpics', response.data.aboutpics);
        })
    },
    AboutPicById(context, payload){
        axios.get('/aboutpic/show/'+payload)
              .then((response)=>{
                  console.log(response.data)
                  context.commit('singleaboutpic', response.data.singleaboutpic)
              })
    },
  }
const mutations = {
    aboutpic(state, data){
      return state.aboutpic = data;
    },
    aboutpics(state, data){
      return state.aboutpics = data;
    },
    singleaboutpic(state, data){
        return state.singleaboutpic = data
    },
  }

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}
