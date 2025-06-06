CREATE TABLE tblmagazine (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cover_image VARCHAR(255) NOT NULL,
    pdf_link VARCHAR(255) NOT NULL,
    date_of_update DATE NOT NULL,
    magazine_issue_month INT NOT NULL,
    magazine_issue_year INT NOT NULL
);
