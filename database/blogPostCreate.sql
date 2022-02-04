INSERT INTO Articles(Title, Cont, DateStart, DateEnd, Rank, Authors_ID)
VALUES (:title,
        :content,
        :startDate,
        :endDate,
        :rank,
        :authorId);