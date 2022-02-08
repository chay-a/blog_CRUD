SELECT Articles.ID, Articles.Title, Articles.Cont, Articles.DateStart, Articles.DateEnd, Articles.Rank, Authors.Pseudo
FROM Articles
         INNER JOIN Authors ON Articles.Authors_ID = Authors.ID
WHERE Articles.ID =?;