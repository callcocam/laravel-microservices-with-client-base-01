export function generateRoutes(data) {
    let routers = [];
    if (data) {
        data.map(rote => {
            if(rote){
                if(rote.children){
                    if(rote.children.edit){
                        routers.push(
                            {
                                name: rote.children.edit.name,
                                path: rote.children.edit.path,
                                component: () =>
                                    import(
                                        /* webpackChunkName: "edit" */ `@views/pages/${rote.children.edit.component}`
                                        ),
                                meta: rote.children.edit.meta
                            }
                        );
                    }// fim do if route children edit

                    if(rote.children.show){
                        routers.push(
                            {
                                name: rote.children.show.name,
                                path: rote.children.show.path,
                                component: () =>
                                    import(
                                        /* webpackChunkName: "show" */ `@views/pages/${rote.children.show.component}`
                                        ),
                                meta: rote.children.show.meta
                            }
                        );
                    }// fim do if route children show

                    if(rote.children.destroy){
                        routers.push(
                            {
                                name: rote.children.destroy.name,
                                path: rote.children.destroy.path,
                                component: () =>
                                    import(
                                        /* webpackChunkName: "destroy" */ `@views/pages/${rote.children.destroy.component}`
                                        ),
                                meta: rote.children.destroy.meta
                            }
                        );
                    }// fim do if route children destroy

                    if(rote.children.create){
                        routers.push(
                            {
                                name: rote.children.create.name,
                                path: rote.children.create.path,
                                component: () =>
                                    import(
                                        /* webpackChunkName: "create" */ `@views/pages/${rote.children.create.component}`
                                        ),
                                meta: rote.children.create.meta
                            }
                        );
                    }// fim do if route children create

                    if(rote.children.list){
                        routers.push(
                            {
                                name: rote.children.list.name,
                                path: rote.children.list.path,
                                component: () =>
                                    import(
                                        /* webpackChunkName: "list" */ `@views/pages/${rote.children.list.component}`
                                        ),
                                meta: rote.children.list.meta
                            }
                        );
                    }// fim do if route children list

                }// fim do if route children

                routers.push(
                    {
                        name: rote.name,
                        path: rote.path,
                        component: () =>
                            import(
                                /* webpackChunkName: "list" */ `@views/pages/${rote.component}`
                                ),
                        meta: rote.meta
                    }
                );
            }// fim do if route

        });//fim do map route
    }
    return routers;
}
