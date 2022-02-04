SELECT Articles.ID, Articles.Title, Articles.Cont, Authors.Pseudo
FROM Articles
         INNER JOIN Authors ON Articles.Authors_ID = Authors.ID
ORDER BY Articles.ID DESC
LIMIT ?;