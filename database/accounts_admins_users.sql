USE `drs_shop`;
INSERT INTO `admins_accounts` (
        `fullName`,
        `email`,
        `password`,
        `phone`,
        `DOB`,
        `gender`,
        `city`,
        `address`
    )
VALUES (
        'yassin admin',
        'yassinadmin@gmail.com',
        'YASSINyassin123',
        '0614523698',
        '2002-05-10',
        'male',
        'Guelmin',
        'Bla Bla 55 Guelmim'
    ),
    (
        'omar admin',
        'omaradmin@gmail.com',
        'OMARomar123',
        '0614526987',
        '1996-11-20',
        'male',
        'Tanger',
        'Bla Bla 55 Tanger'
    ),
    (
        'saad admin',
        'saadadmin@gmail.com',
        'SAADsaad123',
        '0614523698',
        '2002-11-25',
        'male',
        'Rabat',
        'Bla Bla 55 Rabat'
    ),
    (
        'imane admin',
        'imaneadmin@gmail.com',
        'IMANEimane123',
        '0665236521',
        '2003-08-12',
        'female',
        'Guelmim',
        'Bla Bla 55 Guelmim'
    ),
    (
        'ismail admin',
        'ismailadmin@gmail.com',
        'ISMAILismail123',
        '0712547895',
        '2001-02-06',
        'male',
        'Rabat',
        'Bla Bla 55 Rabat'
    ),
    (
        'oumima admin',
        'oumimaadmin@gmail.com',
        'OUMIMAoumima123',
        '0781236547',
        '1999-05-05',
        'female',
        'Guelmim',
        'Bla Bla 55 Guelmim'
    ),
    (
        'anwar admin',
        'anwaradmin@gmail.com',
        'ANWARanwar123',
        '0715241526',
        '2002-02-30',
        'male',
        'Agadir',
        'Bla Bla 55 Agadir'
    ),
    (
        'laila admin',
        'lailaadmin@gmail.com',
        'Lailalaila123',
        '0612365478',
        '1980-02-06',
        'female',
        'Fes',
        'Bla Bla 55 Fes'
    ),
    (
        'jamal admin',
        'jamaladmin@gmail.com',
        'JAMALjamal123',
        '0632514251',
        '1990-06-12',
        'male',
        'Guelmim',
        'Bla Bla 55 Guelmim'
    ),
    (
        'latifa admin',
        'latifaadmin@gmail.com',
        'LATIFAlatifa123',
        '0615987456',
        '2001-05-11',
        'female',
        'Guelmim',
        'Bla Bla 55 Guelmim'
    );
INSERT INTO `users_accounts` (
        `fullName`,
        `email`,
        `password`,
        `phone`,
        `DOB`,
        `gender`,
        `city`,
        `address`
    )
VALUES (
        'Ahmed Ahmed',
        'ahmed@gmail.com',
        'AHMEDahmed123',
        '0654123658',
        '1980-05-15',
        'male',
        'Agadir',
        'َBla Bla 55 Agadir'
    ),
    (
        'ali ali',
        'ali@gmail.com',
        'ALIali123',
        '063214562',
        '2000-02-05',
        'male',
        'Guelmim',
        'َBla Bla 55 Guelmim'
    ),
    (
        'said said',
        'said@gmail.com',
        'SAIDsaid123',
        '0615487956',
        '2000-12-20',
        'male',
        'Guelmim',
        'َBla Bla 55 Guelmim'
    ),
    (
        'wafae wafae',
        'wafae@gmail.com',
        'WAFAEwafae123',
        '0651236548',
        '1990-05-04',
        'female',
        'Guelmim',
        'َBla Bla 55 Guelmim'
    ),
    (
        'salah salah',
        'salah@gmail.com',
        'SALAHsalah123',
        '0654851236',
        '1990-02-15',
        'male',
        'Guelmim',
        'َBla Bla 55 Guelmim'
    ),
    (
        'sokina sokina',
        'sokina@gmail.com',
        'SOKINAsokina123',
        '0632565412',
        '2002-02-06',
        'female',
        'Guelmim',
        'َBla Bla 55 Guelmim'
    ),
    (
        'abderhman abderhman',
        'abderhman@gmail.com',
        'ABDERHMANabderhman123',
        '0651324895',
        '1970-10-30',
        'male',
        'Guelmim',
        'َBla Bla 55 Guelmim'
    ),
    (
        'sohil sohil',
        'sohil@gmail.com',
        'SOHILsohil123',
        '0635214526',
        '2000-05-04',
        'male',
        'Guelmim',
        'َBla Bla 55 Guelmim'
    ),
    (
        'adnan adnan',
        'adnan@gmail.com',
        'ADNANadnan123',
        '0632514251',
        '1995-05-22',
        'male',
        'Guelmim',
        'َBla Bla 55 Guelmim'
    ),
    (
        'anas anas',
        'anas@gmail.com',
        'ANASanas123',
        '0632514256',
        '2000-05-22',
        'male',
        'Guelmim',
        'َBla Bla 55 Guelmim'
    );
INSERT INTO `all_accounts` (`account`, `user_admin`)
VALUES ('yassinadmin@gmail.com', 'admin'),
    ('omaradmin@gmail.com', 'admin'),
    ('saadadmin@gmail.com', 'admin'),
    ('imaneadmin@gmail.com', 'admin'),
    ('ismailadmin@gmail.com', 'admin'),
    ('oumimaadmin@gmail.com', 'admin'),
    ('anwaradmin@gmail.com', 'admin'),
    ('lailaadmin@gmail.com', 'admin'),
    ('jamaladmin@gmail.com', 'admin'),
    ('latifaadmin@gmail.com', 'admin'),
    ('ahmed@gmail.com', 'user'),
    ('adnan@gmail.com', 'user'),
    ('ali@gmail.com', 'user'),
    ('said@gmail.com', 'user'),
    ('wafae@gmail.com', 'user'),
    ('salah@gmail.com', 'user'),
    ('sokina@gmail.com', 'user'),
    ('abderhman@gmail.com', 'user'),
    ('sohil@gmail.com', 'user'),
    ('anas@gmail.com', 'user');