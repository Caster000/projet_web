/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('commentaire', {
    'id_commentaire': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      primaryKey: true,
      comment: "null",
      autoIncrement: true
    },
    'commentaire': {
      type: DataTypes.STRING(600),
      allowNull: false,
      comment: "null"
    },
    'visible': {
      type: DataTypes.INTEGER(4),
      allowNull: false,
      comment: "null"
    },
    'id_personne': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      comment: "null",
      references: {
        model: 'personne',
        key: 'id_personne'
      }
    },
    'id_photo': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      comment: "null",
      references: {
        model: 'photo',
        key: 'id_photo'
      }
    }
  }, {
    tableName: 'commentaire'
  });
};
