CREATE TABLE test.stocks (
	id bigint NOT NULL,
	status varchar(250) NULL,
	itemCode BIGINT NULL,
	registUser BIGINT NULL,
	updateUser BIGINT NULL,
	enable BOOL NULL,
	createAt DATETIME NOT NULL,
	updateAt DATETIME NOT NULL,
	CONSTRAINT stock_PK PRIMARY KEY (id)
)
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE test.department_masters (
	name VARCHAR(100) NOT NULL,
	enable BOOL NULL,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL
)
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE test.item_masters (
	name varchar(100) NOT NULL,
	enable BOOL NULL,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL
)
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE test.users (
	name varchar(100) NULL,
	email varchar(100) NOT NULL,
	departmentId bigint NULL,
	encrypted_password varchar(100) NOT NULL,
	reset_password_token varchar(100) NULL,
	reset_password_sent_at DATETIME NULL,
	remember_created_at DATETIME NULL,
	created_at DATETIME NOT NULL,
	updated_at DATETIME NOT NULL
)
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;
