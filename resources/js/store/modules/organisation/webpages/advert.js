
//permission

const state = {
    advert:[],
    adverts:[],
    singleadvert:[],
  },
  getters = {
    Advert(state){
      return state.advert;
    },
    Adverts(state){
      return state.adverts;
    },
    SingleAdvert(state){
        return state.singleadvert;
    },
  }
const actions = {
    advert(context){
        axios.get('/advert/get')//based on authethicated id
        .then((response)=>{
          console.log(response.data);
          context.commit('advert', response.data.advert); //based on authethicated id
        });
    },
    adverts(context){
        axios.get('/adverts/get')
        .then((response)=>{
        //   console.log(response.data.adverts);
          context.commit('adverts', response.data.adverts);
        });
    },
    AdvertById(context, payload){
        axios.get('/advert/show/'+payload)
              .then((response)=>{
                  console.log('ffffffffffff');
                  context.commit('singleadvert', response.data.singleadvert);
              });
    },
  }

const mutations = {
    advert(state, data){
      return state.advert = data;
    },
    adverts(state, data){
      return state.adverts = data;
    },
    singleadvert(state, data){
      return state.singleadvert = data;
    }
  }

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}


