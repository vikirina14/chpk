<?php
// Конфигурация сайта чемпионата
return [
    // Основные настройки
    'site' => [
        'name' => 'YoungMasters Championship 2026',
        'title' => 'Чемпионат молодых мастеров',
        'url' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]",
        'description' => 'I Региональный Чемпионат для воспитанников ДОУ и обучающихся 1-8 классов Чувашской Республики',
        'keywords' => 'чемпионат, молодые мастера, Чувашия, профориентация, дети, конкурс',
        'author' => 'ГАПОУ ЧР "Чувашский педагогический колледж им. Н.В. Никольского"',
        'year' => '2025-2026',
        'version' => '1.0.0'
    ],
    
    // Настройки чемпионата
    'championship' => [
        'full_name' => 'I Региональный Чемпионат молодых мастеров',
        'dates' => [
            'registration_start' => '2026-01-16',
            'registration_end' => '2026-01-20',
            'online_start' => '2026-01-19',
            'online_end' => '2026-02-21',
            'final_start' => '2026-03-23',
            'final_end' => '2026-03-27',
            'practice' => '2026-03-17'
        ],
        
        'competencies' => [
            'Педагогика' => [
                'ages' => ['ДОУ', '1-4 класс', '5-8 класс'],
                'color' => '#43aa8b',
                'icon' => 'fa-chalkboard-teacher',
                'experts' => ['Волкова Е.А.', 'Трибухина Ю.С.', 'Хураськина Е.Л.'],

            'remote_stage_materials' => [
                '1-4 класс' => 'materials/pedagogy/distant/1-4.docx',
                '5-8 класс' => 'materials/pedagogy/distant/5-8.docx',
                'ДОУ' => 'materials/pedagogy/distant/ДОУ.docx'
            ],
            'final_stage_materials' => [
                '1-4 класс' => 'materials/pedagogy/final/1-4.docx',
                '5-8 класс' => 'materials/pedagogy/final/5-8.docx',
                'ДОУ' => 'materials/pedagogy/final/ДОУ.docx'
            ],
            'remote_stage_results' => [
               # '1-4 класс' => 'materials/pedagogy/results_remote_1-4.pdf',
               # '5-8 класс' => 'materials/pedagogy/results_remote_5-8.pdf',
               # 'ДОУ' => 'materials/pedagogy/results_remote_DOY.pdf'
            ],
            'final_stage_results' => [
               # '1-4 класс' => 'materials/pedagogy/results_final_1-4.pdf',
               # '5-8 класс' => 'materials/pedagogy/results_final_5-8.pdf',
               # 'ДОУ' => 'materials/pedagogy/results_final_DOY.pdf'
            ]
            ],
            'Графический дизайн' => [
                'ages' => ['ДОУ', '1-4 класс', '5-8 класс'],
                'color' => '#4cc9f0',
                'icon' => 'fa-paint-brush',
                'experts' => ['Евграфова Н.С.', 'Мурзаева К.В.', 'Трофимова Е.В.'],

            'remote_stage_materials' => [
                '1-4 класс' => 'materials/graphic_design/distant/1_4.docx',
                '5-8 класс' => 'materials/graphic_design/distant/5_8.docx',
                'ДОУ' => 'materials/graphic_design/distant/ДОУ_.docx'
            ],
            'final_stage_materials' => [
                '1-4 класс' => 'materials/graphic_design/final/1-4.docx',
                '5-8 класс' => 'materials/graphic_design/final/5-8.docx',
                'ДОУ' => 'materials/graphic_design/final/ДОУ.docx'
            ],
            'remote_stage_results' => [
              #  '1-4 класс' => 'materials/graphic_design/results_remote_1-4.pdf',
              #  '5-8 класс' => 'materials/graphic_design/results_remote_5-8.pdf',
               # 'ДОУ' => 'materials/graphic_design/results_remote_DOY.pdf'
            ],
            'final_stage_results' => [
               # '1-4 класс' => 'materials/graphic_design/results_final_1-4.pdf',
               # '5-8 класс' => 'materials/graphic_design/results_final_5-8.pdf',
               # 'ДОУ' => 'materials/graphic_design/results_final_DOY.pdf'
            ]
            ],
            'Программирование' => [
                'ages' => ['ДОУ', '1-4 класс', '5-8 класс'],
                'color' => '#f72585',
                'icon' => 'fa-code',
                'experts' => ['Агеева Л.А.', 'Тихонова А.В.'],

            'remote_stage_materials' => [
                '1-4 класс' => 'materials/programming/distant/1-4.docx',
                '5-8 класс' => 'materials/programming/distant/5-8.docx',
                'ДОУ' => 'materials/programming/distant/ДОУ.docx'
               
            ],
            'final_stage_materials' => [
                '1-4 класс' => 'materials/programming/final/1-4.docx',
                '5-8 класс' => 'materials/programming/final/5-8.docx',
                'ДОУ' => 'materials/programming/final/ДОУ.docx'
              
            ],
            'remote_stage_results' => [
               # '1-4 класс' => 'materials/programming/results_remote_1-4.pdf',
                
            ],
            'final_stage_results' => [
               # '1-4 класс' => 'materials/programming/results_final_1-4.pdf',
                
            ]
            ],
            'Обслуживание автомобилей' => [
                'ages' => ['1-4 класс', '5-8 класс'],
                'color' => '#f9c74f',
                'icon' => 'fa-car',
                'experts' => ['Григорьев А.Ю.', 'Яробаров Д.В.'],

            'remote_stage_materials' => [
                '1-4 класс' => 'materials/automotive/distant/1-4.docx',
                '5-8 класс' => 'materials/automotive/distant/5-8.docx'
            ],
            'final_stage_materials' => [
                '1-4 класс' => 'materials/automotive/final/1-4.docx',
                '5-8 класс' => 'materials/automotive/final/5-8.docx'
            ],
            'remote_stage_results' => [
              #  '1-4 класс' => 'materials/automotive/results_remote_1-4.pdf',
              #  '5-8 класс' => 'materials/automotive/results_remote_5-8.pdf'
            ],
            'final_stage_results' => [
              #  '1-4 класс' => 'materials/automotive/results_final_1-4.pdf',
              #  '5-8 класс' => 'materials/automotive/results_final_5-8.pdf'
            ]
            ]
        ],
        
        'contacts' => [
            'address' => '428022, Чувашская Республика, г. Чебоксары, ул. Декабристов, д. 17',
            'phone' => '+7 (8352) 63-15-13',
           # 'phone_org' => '+7 (8352) 12-34-57',
           # 'phone_tech' => '+7 (8352) 12-34-58',
            'email' => 'youngmasters@bk.ru',
            'org_email' => 'chpk-nik@rchuv.ru ',
            #'support_email' => 'support@championship.ru',
            'working_hours' => 'Пн-Сб: 8:00-17:00'
        ],
        
        'organizer' => [
            'name' => 'ГАПОУ ЧР "Чувашский педагогический колледж им. Н.В. Никольского"',
            'director' => 'Ефимова Алина Александровна',
           # 'ogrn' => '1022100976347',
           # 'inn' => '2127011215',
            'address' => '428022, г. Чебоксары, Декабристов ул., д. 17'
        ],
        
        'committee' => [
            ['name' => 'Лежнина Марина Николаевна', 'position' => 'Заместитель министра образования ЧР'],
            ['name' => 'Вотякова Людмила Николаевна', 'position' => 'Начальник отдела профобразования'],
            ['name' => 'Лукшин Алексей Петрович', 'position' => 'Начальник управления образования г. Чебоксары'],
            ['name' => 'Ефимова Алина Александровна', 'position' => 'Директор колледжа']
        ]
    ],
    
    // Настройки почты - ВАШИ ДАННЫЕ
    'email' => [
        'admin' => 'youngmasters@bk.ru',
        'from' => 'youngmasters@chnk-cap.ru',
        'subject' => 'Заявка на участие в чемпионате'
    ],
    
    // Настройки загрузки файлов
    'upload' => [
        'path' => $_SERVER['DOCUMENT_ROOT'] . '/uploads/',
        'max_size' => 5 * 1024 * 1024, // 5MB
        'allowed_types' => ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'],
        'max_files' => 5
    ],
    
    // Пути к документам
    'documents' => [
        'path' => $_SERVER['DOCUMENT_ROOT'] . '/documents/', //Путь к документам
        'order' => 'order.pdf', //Приказ о проведении Чемпионата
        'regulation' => 'regulation.pdf', //Положение о проведении Чемпионата
        'forms' => 'forms.zip' //Формы согласий
    ]
];
?>