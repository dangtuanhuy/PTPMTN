# CT249
# GV Trương Thị Thanh Tuyền
***Lưu ý***: Nhánh master chỉ dùng để ***merge, pull và push*** không code trực tiếp trên nhánh master

Tạo local branch:

`git checkout -b local`

Lý do code trên local branch thay vì master:

+ Dễ dàng pull (lưu thay đổi từ github về).
+ Nếu bị lỗi và cần quay về phiên bản gốc, chỉ cần `git merge master`, không cần phải clone về lại.

## Git Push

Sau khi hoàn thành 1 chức năng trên local branch, làm như sau để push:

Commit thay đổi:
```
git add .
git commit -m "Thông điệp" 
# Ex: git commit -m "Hoàn thành thêm sách"
```

Pull remote branch về:
```
git pull origin master
Hoặc
git checkout master
git pull
```
