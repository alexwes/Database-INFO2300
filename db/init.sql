CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
);

CREATE TABLE tags (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    tag_name TEXT NOT NULL UNIQUE
);

CREATE TABLE plants (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    name_coll TEXT NOT NULL,
    name_sci TEXT NOT NULL,
    plant_id TEXT NOT NULL,
    is_explora_const TEXT,
    is_sensory TEXT,
    is_physical TEXT,
    is_imaginative TEXT,
    is_restorative TEXT,
    is_expressive TEXT,
    is_rules TEXT,
    is_bio TEXT,
    is_perennial TEXT,
    is_annual TEXT,
    full_sun TEXT,
    partial_shade TEXT,
    full_shade TEXT,
    hardiness_range TEXT
);

CREATE TABLE plant_tags (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    plant_id INTEGER NOT NULL,
    tag_id INTEGER NOT NULL,
    FOREIGN KEY (plant_id) REFERENCES plants(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id)
);

CREATE TABLE sessions (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    session TEXT NOT NULL UNIQUE,
    user_id TEXT NOT NULL,
    last_login TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE groups(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    name TEXT NOT NULL UNIQUE
);

CREATE TABLE memberships(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    group_id  INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    FOREIGN KEY(group_id) REFERENCES groups(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);



-- plant table
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules, is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('Swamp Azalea (Clammy Azalea)', 'Rhododendron viscosum','SH_30','','X','', 'X', '', '', '','X', 'X','',"",'X','', '4-9');
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules, is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('Bronze Fennel', 'Foeniculum vulgare Purpureum','FL_16','','X','','X','X','','X','X','','X', '', 'X', '', '4');
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules, is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('Soapwort', 'Saponaria officinalis','GR_17','','X','X','','','','','X',"X", '', 'X', '', '', '3-8');
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules,is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('Iris, tall bearded', 'Iris, Florentina','FL_31','','X','X','X','','','','X',"X", '', 'X', '', '', '3-9');
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules,is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('Sugar Maple', 'Acer saccharum ','TR_25','X','X','X','X','X','','','X',"X", '', 'X', 'X', '', '3-8');
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules,is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('Common Strawberry', 'Fragaria virginiana','GR_22','','X','X','','X','','','X',"X", '', 'X', 'X', '', '4-9');
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules,is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('Trumpet creeper', 'Campsis radicans','VI_14','','X','X','X','','','','X',"X", '', 'X', 'X', '', '');
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules,is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('Star Magnolia', 'Magnolia stellata','TR_10','X','X','X','X','X','','','X',"", '', 'X', 'X', '', '5-8');
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules,is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('American Holly', 'Ilex opaca','TR_28','X','X','X','X','','','','X',"X", '', 'X', 'X', '', '5-9');
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules,is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('Dill', 'Anethum graveolens','FL_15','','X','','X','X','','X','X', "X", '', 'X', '', '', '2-11');
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules,is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('Bunchberry', 'Cornus canadensis','GR_21','','X','X','X','','','','X',"X", '', '', 'X', '', '2-6');
INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules,is_bio, is_perennial, is_annual, full_sun, partial_shade, full_shade, hardiness_range) VALUES ('Windflower', 'Anemone canadensis','GR_23','','X','X','','','','','X',"X", '', 'X', 'X', '', '3-8');

-- users table
INSERT INTO users (username, password) VALUES ('kyle', '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.');
INSERT INTO users (username, password) VALUES ('sharon', '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.');



-- tags table
INSERT INTO 'tags' ('tag_name') VALUES ('Shrub');
INSERT INTO 'tags' ('tag_name') VALUES ('Grass');
INSERT INTO 'tags' ('tag_name') VALUES ('Vine');
INSERT INTO 'tags' ('tag_name') VALUES ('Tree');
INSERT INTO 'tags' ('tag_name') VALUES ('Flower');
INSERT INTO 'tags' ('tag_name') VALUES ('Groundcovers');


-- plant tag table
INSERT INTO plant_tags (plant_id, tag_id) VALUES (1,1);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (1,2);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (1,3);

INSERT INTO plant_tags (plant_id, tag_id) VALUES (2,5);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (2,7);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (3,6);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (4,5);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (5,4);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (6,6);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (6,4);

INSERT INTO plant_tags (plant_id, tag_id) VALUES (7,3);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (8,4);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (9,4);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (10,5);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (11,6);
INSERT INTO plant_tags (plant_id, tag_id) VALUES (12,6);

INSERT INTO groups (id, name) VALUES (1, 'admin');

INSERT INTO memberships (group_id, user_id) VALUES (1,1);
