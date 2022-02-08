UPDATE Articles
SET Title = :title,
    Cont = :content,
    DateStart = :startDate,
    DateEnd = :endDate,
    Rank = :rank,
    Authors_ID = :authorId
WHERE Articles.ID = :articleID;