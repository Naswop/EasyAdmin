define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'system.groups/index',
        add_url: 'system.groups/add',
        edit_url: 'system.groups/edit',
        delete_url: 'system.groups/delete',
        modify_url: 'system.groups/modify',
        export_url: 'system.groups/export',
    };

    var Controller = {

        index: function () {

            ea.table.render({
                init: init,
                cols: [[
                    { type: "checkbox" },
                    { field: 'id', width: 80, title: 'ID' },
                    { field: 'sort', width: 80, title: '排序', edit: 'text' },
                    { field: 'title', minWidth: 80, title: '班组名称' },
                    { field: 'remark', minWidth: 80, title: '备注信息' },
                    { field: 'status', title: '状态', width: 85, search: 'select', selectList: { 0: '禁用', 1: '启用' }, templet: ea.table.switch },
                    { field: 'create_time', minWidth: 80, title: '创建时间', search: 'range' },
                    {
                        width: 250,
                        title: '操作',
                        templet: ea.table.tool,
                        operat: [
                            'edit',
                            // [{
                            //     text: '设置密码',
                            //     url: init.password_url,
                            //     method: 'open',
                            //     auth: 'password',
                            //     class: 'layui-btn layui-btn-normal layui-btn-xs',
                            // }],
                            'delete'
                        ]
                    }
                ]],
            });

            ea.listen();
        },
        add: function () {
            ea.listen();
        },
        edit: function () {
            ea.listen();
        },
        // password: function () {
        //     ea.listen();
        // }
    };
    return Controller;
});