# Проектирование
### Сущности
1. Author
   - First_Name (решил декомпозировать ФИО на отдельные поля)
   - Last_name
   - Middle_name
   - Avatar
   - Birth_date (не понял в задании имелась ввиду дата или год, дата звучит логичнее)
   - Biography
   - Slug
2. Category
   - Name
   - Image
   - Description
   - Slug
3. Article
   - Name
   - Image
   - Preview
   - Text
   - Author (FK)
   - Slug
4. Article_Category
   - Category (FK)
   - Article (FK)
    
### Маршруты
- GET: /api/authors - список всех авторов;
- GET: /api/categories - список всех категорий;
- GET: /api/articles - список всех статей;
- GET: /api/authors?search[last_name]=Иванов - пример поиска авторов с фамилией Иванов;
- GET: /api/authors?per_page=100&page=1 - пример пагинации с шагом в 100 результатов;  
- GET: /api/authors?sort=birth_date&order=desc - пример сортировки по дате рождения в обратном порядке;
- GET: /api/authors?id=666 - пример точного поиска по id (аналогично со slug);

### Формат возвращаемых данных
- GET: /api/authors?search[last_name]=Иванов
```json
{
   "status": "ok",
   "meta": {
      "count": 2
   },
   "data": [
      {
         "first_name": "Иван",
         "last_name": "Иванов",
         ...
      },
      {
         "first_name": "Van",
         "last_name": "Иванов",
         ...
      }
   ]
}
```
