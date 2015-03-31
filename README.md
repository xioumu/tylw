#一个论文审查系统
##使用工具

 - xampp v1.8.2
 - php v5.4.1
 - bootstrap 2
 - Javascript
 - JQuery
 - charisma https://github.com/xioumu/charisma
##文件大概结构
---

```
./
    backups/ 放备份文件
    css/    放CSS文件 
    doc/    放一些样例表格
    download/   备份文件下载地址
    extend/ 备份压缩用的工具
    img/    放要用的图标
    js/     放JS文件
    phpExcel/   phpExcel类，用来存取EXCEL
    upFile/     存放上传的文件
        exl/    上传的EXL表格
        paper/  上传的论文
        report/ 上传的开题报告
        tylw.sql 每日的数据库备份文件，还原时导入即可
    verification/   验证码类
    addEva.php  添加审评
    addUser.php 添加用户
    backups.bat 备份程序,要自动备份只需设定定时程序运行此文件即可
    backups.php 备份程序
    changeInfo.php  修改信息
    changePasswd.php 修改密码
    config.php  配置信息
    css.php 用来批量载入CSS信息
    delEva.php  删除审评页面
    delRecUser.php  删除归档的用户信息
    delUser.php 删除用户
    getInfo.php 获取用户信息
    header.php  标题栏页面
    index.html  测试页面 
    leadOutPaper.php    下载全部论文或者下载备份
    leadOutPasswd.php   导出老师或学生信息到excel文件
    loadInfo.php    导入excel文件信息
    login.php   首页即登入页面
    logout.php  注销
    myFunction.php  公用的函数，函数头有注释
    on-teacher-check.php    校内老师审核页面
    on-teacher-check-info.php   校内老师查看自己信息页面
    on-teacher-left.php 校内老师左边栏
    print-eva.php   打印审评
    README.md   本文件
    script.php  载入script文件
    secretary-left  教学秘书左边栏
    secretary-view-student.php  教学秘书看学生信息界面
    student-info.php    学生看自己信息页面
    student-left.php    学生页面左边栏
    student-result.php  学生看自己审评结果界面
    student-submint.php 学生提交论文和开题报告页面
    student-view-eva.php    学生查看审评细节页面
    stuTypeOperation.php    添加学生类别
    submitEvaInfo.php   提交审评信息
    sys-admin-left.php  系统管理员左边栏
    sys-admin-manage.php    系统管理员管理页面
    upLoadPaper.php 上传论文和开题报告
    web-admin-add-eva.php   网络管理员添加审评百分比页面
    web-admin-add-eva-stu.php   网络管理员指定审评学生页面
    web-admin-add-one-eva.php   网络管理员添加单个审评页面
    web-admin-add-OnTeachear.php    网络管理员导入校内专家页面
    web-admin-add-rand-select.php   随机抽选校内专家
    web-admin-add-select-choice.php 指定校内专家不参与抽选
    web-admin-add-rand-select-choice-subject.php    抽选指定专业校内专家
    web-admin-add-student.php   网络管理员导入学生预览页面
    web-admin-deadline.php  网络管理员设置期限页面
    web-admin-downloadBackup.php    网络管理员下载备份页面
    web-admin-eva-changeInfo.php    网络管理员修改审评人员页面
    web-admin-eva-manage.php    网络管理员管理审评信息页面
    web-admin-finish.php    网络管理员归档页面
    web-admin-finish-info.php   管理管理员查看归档信息页面
    web-admin-finish-fino-select.php    网络管理员选择要查看的归档信息页面
    web-admin-left.php  网络管理员左边栏页面
    web-admin-OnTeacher-manage.php  网络管理员校内专家管理页面
    web-admin-OutTeacher-manage.php 网络管理员校外专家管理页面
    web-admin-passwd.php    网络管理员修改账号密码页面
    web-admin-secretary-add.php 网络管理员添加教学秘书页面
    web-admin-secretary-manage.php  网络管理员管理教学秘书页面
    web-admin-set-repeatRate.php    网络管理员设置论文审核通过率界面
    web-admin-student-manage.php    网络管理员管理学生页面
    web-admin-type-manage.php   网络管理员管理学生类别页面
    web-admin-view-eva.php  网络管理员查看审评细节页面
    web-admin-view-rec-eva.php  网络管理员查看归档审评细节页面
    
    
    
```    
    
