CREATE TABLE tx_cmmultiplechoice_domain_model_fragen (
	frage_text text NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	frage_antwort text NOT NULL
);

CREATE TABLE tx_cmmultiplechoice_domain_model_antworten1 (
	antwort_text varchar(255) NOT NULL DEFAULT ''
);
