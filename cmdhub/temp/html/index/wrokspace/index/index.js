document.getElementById('toggleButton').addEventListener('click', function() {
    alert('工具栏功能待开发！'); // 这里可以添加你的功能
});

// 发表作品按钮功能
document.getElementById('publishButton').addEventListener('click', function() {
    alert('作品已发表！');
});

// 保存草稿按钮功能
document.getElementById('saveDraftButton').addEventListener('click', function() {
    alert('草稿已保存！');
});

// 取消按钮功能
document.getElementById('cancelButton').addEventListener('click', function() {
    if (confirm('确定要取消吗？所有未保存的信息将会丢失。')) {
        document.getElementById('projectName').value = '';
        document.getElementById('projectDetails').value = '';
        document.getElementById('minecraftVersion').value = '';
        document.getElementById('projectVersion').value = '';
    }
});
