SELECT Comments.Cont, Comments.Date ,Articles_ID, Authors.Pseudo
FROM Comments
INNER JOIN Authors ON Comments.Authors_ID = Authors.ID
WHERE Articles_ID = ?;