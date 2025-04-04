# Проект: Интерактивное веб-приложение с использованием Livewire и Alpine.js

**Технологии**:
- [Laravel Livewire](https://laravel-livewire.com/) (для реактивности на стороне сервера)
- [Alpine.js](https://alpinejs.dev/) (для клиентской реактивности)

---

## Примеры реализации

### 1. Многошаговая форма (`/multi-step-form`)
**Функционал**:
- Последовательный переход между шагами
- Валидация данных
- Сохранение в БД

**Ссылки на код**:
- Компонент Livewire: [`app/Http/Livewire/MultiStepForm.php`](https://github.com/Solomka-0/task-project-15/blob/main/app/Livewire/MultiStepForm.php)
- Шаблон Blade: [`resources/views/livewire/multi-step-form.blade.php`](https://github.com/Solomka-0/task-project-15/blob/main/resources/views/livewire/multi-step-form.blade.php)

---

### 2. Управление задачами (`/tasks`)
**Функционал**:
- CRUD для задач
- Фильтрация и сортировка

**Ссылки на код**:
- Компонент Livewire: [`app/Http/Livewire/TaskManager.php`](https://github.com/Solomka-0/task-project-15/blob/main/app/Livewire/TaskManager.php)
- Компонент Blade: [`resources/views/components/task-modal.blade.php`](https://github.com/Solomka-0/task-project-15/blob/main/resources/views/livewire/task-manager.blade.php)
- Эндпоинты: [`routes/api.php`](https://github.com/Solomka-0/task-project-15/blob/main/routes/web.php#L45-L62)

---

### 3. Регистрация (`/registration`)
**Функционал**:
- Валидация формы
- Отправка подтверждения по email

**Ссылки на код**:
- Livewire-компонент: [`app/Http/Livewire/RegisterForm.php`](https://github.com/Solomka-0/task-project-15/blob/main/app/Livewire/RegisterForm.php)
- Email-шаблон: [`resources/views/livewire/confirmation.blade.php`](https://github.com/Solomka-0/task-project-15/blob/main/resources/views/livewire/register-form.blade.php)

---

### 4. Управление пользователями (`/users`)
**Функционал**:
- Редактирование ролей
- Блокировка пользователей

**Ссылки на код**:
- Таблица с пользователями (Livewire): [`app/Http/Livewire/UserTable.php`](https://github.com/Solomka-0/task-project-15/blob/main/app/Livewire/UserTable.php)
- Blade-шаблон: [`resources/views/livewire/register-form.blade.php`](https://github.com/Solomka-0/task-project-15/blob/main/resources/views/livewire/register-form.blade.php)

---

### 5. Уведомления (`/notifications`)
**Функционал**:
- Real-time обновления
- Счётчик непрочитанных

**Ссылки на код**:
- Компонент Livewire: [`app/Http/Livewire/Notifications.php`](https://github.com/Solomka-0/task-project-15/blob/main/app/Livewire/Notifications.php)
- Blade-шаблон: [`resources/views/livewire/notifications.blade.php`](https://github.com/Solomka-0/task-project-15/blob/main/resources/views/livewire/notifications.blade.php)

---

## Итоговые навыки
✅ **Full-stack реактивность**: синхронизация Livewire (сервер) + Alpine.js (клиент)  
✅ **Работа с WebSockets**: интеграция Pusher и Laravel Echo  
✅ **Безопасность**: ролевая модель, хеширование паролей  
✅ **Оптимизация UX**: динамические формы, модальные окна, real-time элементы

[Ссылка на полный исходный код](https://github.com/Solomka-0/task-project-15/blob/main)
