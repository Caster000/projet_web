/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('commenter', {
    'id_photo': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      comment: "null",
      references: {
        model: 'photo',
        key: 'id_photo'
      }
    },
    'id_personne': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      comment: "null",
      references: {
        model: 'personne',
        key: 'id_personne'
      }
    },
    'Commentaire': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    }
  }, {
    tableName: 'commenter'
  });
};
