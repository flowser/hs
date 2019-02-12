import AdminHome from './components/admins/AdminHome.vue';
//Permission
import PermissionList from './components/admins/organisation/superadmin/permission/List.vue';
//role
import RoleList from './components/admins/organisation/superadmin/role/List.vue';
//user
import UserList from './components/admins/organisation/superadmin/user/List.vue';
//Organisation settings
import Orgsetting from './components/admins/organisation/Organisation.vue';

//single about image full more
import SingleAboutImage from './components/admins/organisation/SingleAboutPic.vue';

//Single Advert read more
import SingleAdvert from './components/admins/organisation/SingleAdvert.vue';

//Single Service read more
import SingleService from './components/admins/organisation/SingleService.vue';

//Single ExtraService read more
import SingleExtraService from './components/admins/organisation/SingleExtraService.vue';

//Single Service Filter read more
import SingleServiceFilter from './components/admins/organisation/SingleServiceFilter.vue';
// // //course
// // import CourseList  from './components/admin/course/List.vue'
// // import AddCourse  from './components/admin/course/New.vue'
// // import EditCourse  from './components/admin/course/Edit.vue'

// // //FrontEnd Comonent
// // import PublicHome from './components/public/PublicHome.vue'
// // import BlogCourse from './components/public/blog/BlogCourse.vue'
// // import SingleCourse from './components/public/blog/SingleBlog.vue'





export const routes = [
    {
      path: '/home',
      component: AdminHome
    },
    //Permisions
    {
      path: '/permissions',
      component: PermissionList
    },

    //Roles
    {
      path: '/roles',
      component: RoleList
    },

    //Users
    {
      path: '/users',
      component:UserList
    },
    //Organisation Settings
    {
      path: '/settings',
      component:Orgsetting
    },
//about pic more
    {
      path:'/aboutimage/:id',
      component: SingleAboutImage
    },
//advert read more
    {
      path:'/advert/:id',
      component: SingleAdvert
    },
//service read more
    {
      path:'/service/:id',
      component: SingleService
    },
//Extraservice read more
    {
      path:'/extraservice/:id',
      component: SingleExtraService
    },
//Extraservice read more
    {
      path:'/servicefilter/:id',
      component: SingleServiceFilter
    },
//   //Course
//     {
//       path: '/course-list',
//       component: CourseList
//     },
//     {
//       path: '/add-course',
//       component: AddCourse
//     },
//     {
//       path:'/edit-course/:courseid',
//       component: EditCourse
    // },


// //Front End
//   {
//     path:'/',
//     component: PublicHome
//   },
//   {
//     path:'/blog',
//     component: BlogCourse
//   },
//   {
//     path:'/blog/:id',
//     component: SingleCourse
//   },
//   {
//     path:'/categories/:id',//be reirected to courese blog via category selection
//     component: BlogCourse
//   },



];


