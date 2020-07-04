
export default function() {
    return {
      item: {
        isActivated: true,
        name:'',
        phone:'',
        email:'',
        // client:'',
        roles:[]
      },
      items: [],
      error: null,
      errors: {},
      countUserData:{
        totalUser:0,
        totalUserActifs:0,
        totalUserInactifs:0
      }
    }
  }
  