
        // organisation
            import organisation from './modules/organisation/organisation';
            // under org superadmin
                import permission from './modules/organisation/superadmin/permission';
                import role from './modules/organisation/superadmin/role';
                import user from './modules/organisation/superadmin/user';
                //org Director
                import orgdirector from './modules/organisation/superadmin/director';
                //org Admin
                import orgadmin from './modules/organisation/superadmin/admin';

            //under org Admin
            import orgemployee from './modules/organisation/admin/employee';
             // bureau
             import bureau from './modules/organisation/admin/bureau';
             //bureau Director
             import bureaudirector from './modules/organisation/admin/director';
             //bureau Admin
             import bureauadmin from './modules/organisation/admin/admin';




        //standard
            import countries from './modules/standard/countries';
            import counties from './modules/standard/counties';
            import constituencies from './modules/standard/constituencies';
            import wards from './modules/standard/wards';

        //universal
            import about from './modules/webpages/about';
            import aboutpic from './modules/webpages/aboutpic';
            import advert from './modules/webpages/advert';
            import service from './modules/webpages/service';
            import extraservice from './modules/webpages/extraservice';
            import servicefilter from './modules/webpages/servicefilter';

        export default {
          modules: {
            //organisation
                organisation,
                orgdirector,
                orgadmin,
                orgemployee,
                // orghoushelp, //get all househelps
                user,
                permission,
                role,
            //bureau
                bureau,
                bureaudirector,
                bureauadmin,
                // bureauemployee,
                // bureauhousehelp,
            //househelp
                // househelp,

            //client
                // client,


            //standard
                countries,
                counties,
                constituencies,
                wards,
            //universal
                about,
                aboutpic,
                advert,
                service,
                extraservice,
                servicefilter,
          },
        };

